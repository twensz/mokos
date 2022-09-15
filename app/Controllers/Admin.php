<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        // Cek role user
        if (getRole() == 'user') {
            return redirect()->to('user');
        }

        $data = [
            'judul' => 'Dashboard',
            'tipe' => $this->kamarTipeModel->getTipe(),
            'kamar' => $this->kamarModel->getKamarTersedia(),
            'penghuni' => $this->penghuniModel->getPenghuni(),
            'pembayaran' => $this->pembayaranModel->getPembayaranLimit(5),
            'metode' => $this->metodePembayaranModel->getMetodeTransfer(),
            'penyewaan' => $this->penyewaanModel->getPenyewaan(),
        ];

        // Hitung pendapatan
        $biaya_sewa = $this->pembayaranModel->where('status', 1)->findColumn('total');
        if ($biaya_sewa) {
            $data['pendapatan'] = 0;
            foreach ($biaya_sewa as $sewa) {
                $data['pendapatan'] += $sewa;
            }
        } else {
            $data['pendapatan'] = 0;
        }

        return view('admin/index', $data);
    }

    public function profile()
    {
        $data['judul'] = 'Profile';

        return view('admin/profile', $data);
    }
}
