<?php

namespace App\Models;

use CodeIgniter\Model;

class PenghuniModel extends Model
{
    protected $table = 'penghuni';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['nama', 'ktp', 'kk', 'buku_nikah', 'status', 'is_deleted'];

    function getPenghuni($id = null)
    {
        return $this->where('is_deleted', 0)->find($id);
    }

    function getPenghuniTersedia($id = null)
    {
        return $this->where(['is_deleted' => 0, 'status' => 1])->find($id);
    }

    function getAllPenghuni($id = null)
    {
        return $this->find($id);
    }

    function deletePenghuni($id)
    {
        return $this->save(['id' => $id, 'is_deleted' => 1]);
    }
}
