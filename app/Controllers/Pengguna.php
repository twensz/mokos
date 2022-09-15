<?php

namespace App\Controllers;

class Pengguna extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Pengguna',
            'user' => $this->usersModel->where('')->findAll(),
        ];

        return view('pengguna/index', $data);
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Pengguna',
            'validation' => \Config\Services::validation(),
        ];

        return view('pengguna/tambah', $data);
    }

    public function akun()
    {
        $data['judul'] = 'Akun';

        return view('pengguna/akun', $data);
    }
}

// buka modal
// if (session('errors')) {
//     $data['modal'] = old('id');
// }