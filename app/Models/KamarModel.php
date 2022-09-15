<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_tipe', 'nomor', 'status', 'is_deleted'];

    protected $returnType = 'array';

    function getKamar($id = null)
    {
        return $this->where('is_deleted', 0)->find($id);
    }

    function getKamarTersedia($id = null)
    {
        return $this->where('is_deleted', 0)->where('status', 1)->find($id);
    }

    function getKamarByTipe($id = null)
    {
        return $this->where(['is_deleted' => 0, 'id_tipe' => $id])->find();
    }

    function getAllKamar($id = null)
    {
        return $this->find($id);
    }

    function deleteKamar($id)
    {
        return $this->save(['id' => $id, 'is_deleted' => 1]);
    }

    function deleteKamarByTipe($id)
    {
        $result = $this->getKamarByTipe($id);
        $id = [];
        // Get id kamar
        foreach ($result as $r) {
            array_push($id, $r['id']);
        }

        return $this->save(['id' => $id, 'is_deleted' => 1]);
        // return $this->whereIn('id', $id)
        //     ->set(['is_deleted' => 1])
        //     ->update();
    }

    function deleteFullKamar($id)
    {
        return $this->delete($id);
    }
}
