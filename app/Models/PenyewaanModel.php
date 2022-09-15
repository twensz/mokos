<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyewaanModel extends Model
{
    protected $table = 'penyewaan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['id', 'id_kamar', 'id_penghuni', 'id_user', 'jumlah_penghuni', 'tanggal_masuk', 'tanggal_keluar', 'durasi', 'biaya_sewa', 'status', 'is_deleted'];

    function getPenyewaan($id = null)
    {
        return $this->where('is_deleted', 0)->find($id);
    }

    function getAllPenyewaan($id = null)
    {
        return $this->find($id);
    }

    function isUserBisaSewa()
    {
        if ($this->where('is_deleted', 0)->where('id_user', user_id())->whereIn('status', [1, 2])->find()) {
            return false;
        }

        return true;
    }

    function deletePenyewaan($id)
    {
        return $this->save(['id' => $id, 'is_deleted' => 1]);
    }
}
