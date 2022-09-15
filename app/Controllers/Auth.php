<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'judul' => 'Login | MoKos',
        ];

        return view('auth/login', $data);
    }

    public function register()
    {
        $data = [
            'judul' => 'Daftar | MoKos',
        ];

        return view('auth/register', $data);
    }
}
