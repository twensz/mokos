<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table      = 'pembayaran';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';

    protected $allowedFields = ['id_pembayaran', 'id_penyewaan', 'id_metode', 'waktu_pembayaran', 'bukti_pembayaran', 'status', 'total', 'is_deleted'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function getPembayaran($id = null)
    {
        return $this->where('is_deleted', 0)->find($id);
    }

    function getPembayaranLimit($limit = null)
    {
        return $this->where('is_deleted', 0)->orderBy('id', 'desc')->findAll($limit);
    }

    function getAllPembayaran($id = null)
    {
        return $this->find($id);
    }

    function deletePembayaran($id)
    {
        return $this->save(['id' => $id, 'is_deleted' => 1]);
    }
}
