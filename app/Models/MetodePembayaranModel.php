<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodePembayaranModel extends Model
{
    protected $table      = 'metode_pembayaran';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';

    protected $allowedFields = ['nama_metode', 'nama_bank', 'nomor_rekening', 'gambar', 'is_deleted'];

    function getMetode($id = null)
    {
        return $this->where('is_deleted', 0)->find($id);
    }

    function getMetodeTransfer($id = null)
    {
        return $this->where('is_deleted', 0)->where('id !=', 1)->find($id);
    }

    function getAllMetode($id = null)
    {
        return $this->find($id);
    }

    function deleteMetode($id)
    {
        return $this->save(['id' => $id, 'is_deleted' => 1]);
    }
}
