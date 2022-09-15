<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarTipeModel extends Model
{
    protected $table = 'kamar_tipe';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['nama', 'fasilitas', 'harga', 'gambar', 'status', 'is_deleted'];

    function getTipe($id = null)
    {
        return $this->where('is_deleted', 0)->find($id);
    }
    function getTipeTersedia($id = null)
    {
        return $this->where('is_deleted', 0)->find($id);
    }
    function getAllTipe($id = null)
    {
        return $this->find($id);
    }

    function deleteTipe($id)
    {
        return $this->save(['id' => $id, 'is_deleted' => 1]);
    }
    function deleteFullTipe($id)
    {
        return $this->delete($id);
    }

    function isTipeKosong($id)
    {
        $db = db_connect();

        $builder = $db->table('kamar');
        $builder->where('id_tipe', $id);
        $builder->whereIn('status', [2, 3]);
        $builder->select('DISTINCT(id_tipe)');
        $query = $builder->get()->getResultArray();

        if (!$query) {
            return true;
        } else {
            return false;
        }
    }

    function cekStatusTipe()
    {
        $db = db_connect();

        $builder = $db->table('kamar');
        $builder->where('status', 1);
        $builder->where('is_deleted', 0);
        $builder->select('DISTINCT(id_tipe)');
        $query = $builder->get()->getResultArray();


        $tipe_tersedia = [];
        foreach ($query as $query) {
            array_push($tipe_tersedia, $query['id_tipe']);
        }

        $tipe = $this->findAll();
        foreach ($tipe as $tipe) {
            $db = db_connect();

            $builder = $db->table('kamar');
            $builder->where('id_tipe', 17);
            $builder->where('is_deleted', 0);
            $query = $builder->get()->getResultArray();

            $belumAdaKamar = false;

            if (!$query) {
                $belumAdaKamar = true;
            }

            if (in_array($tipe['id'], $tipe_tersedia) && $tipe['status'] != 0) {
                $this->save([
                    'id' => $tipe['id'],
                    'status' => 1,
                ]);
            } else if ($tipe['status'] != 0 && !$belumAdaKamar) {
                $this->save([
                    'id' => $tipe['id'],
                    'status' => 2,
                ]);
            } else if ($belumAdaKamar) {
                $this->save([
                    'id' => $tipe['id'],
                    'status' => 0,
                ]);
            }
        }
    }
}
