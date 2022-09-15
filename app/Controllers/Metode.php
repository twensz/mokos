<?php

namespace App\Controllers;

class Metode extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Metode Pembayaran',
            'metode' => $this->metodePembayaranModel->findAll(),
        ];

        return view('pembayaran/metode/index', $data);
    }
}
