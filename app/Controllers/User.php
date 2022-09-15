<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'MoKos',
            'tipe'  => $this->kamarTipeModel->getTipe(),
        ];

        return view('user/index', $data);
    }

    public function sewa()
    {
        if (!$this->penyewaanModel->isUserBisaSewa()) {
            return redirect()->to('user/kost')->with('error', 'Tidak bisa menyewa, karena anda sedang menyewa kamar');
        }

        $data = [
            'judul' => 'Sewa',
            'tipe'  => $this->kamarTipeModel->getTipe(),
            'metode'  => $this->metodePembayaranModel->getMetodeTransfer(),
        ];

        return view('user/sewa', $data);
    }

    public function prosesSewa()
    {
        // Validasi
        $rules = [
            'nama' => [
                'rules' => 'required',
                'label' => 'Nama penghuni'
            ],
            'ktp' => [
                'rules' => 'mime_in[ktp,image/jpg,image/jpeg,image/gif,image/png]|max_size[ktp,2500]',
                'label' => 'KTP'
            ],
            'tipe' => [
                'rules' => 'required',
                'label' => 'Tipe Kamar'
            ],
            'tanggal_masuk' => [
                'rules' => 'required',
                'label' => 'Tanggal Masuk'
            ],
            'tanggal_keluar' => [
                'rules' => 'required',
                'label' => 'Tanggal Keluar'
            ],
            'durasi' => [
                'rules' => 'required',
                'label' => 'Durasi'
            ],
            'biaya_sewa' => [
                'rules' => 'required',
                'label' => 'Biaya Sewa'
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        // ---------------------------------------------------
        // Tambah Penghuni
        // ---------------------------------------------------

        // Upload file
        $ktp = $this->_uploadFile('ktp', 'assets/img/dokumen/ktp/');

        // Ambil data dari hasil input
        $data = [
            'nama'       => $this->request->getVar('nama'),
            'status'     => 2,
            'ktp'        => $ktp,
        ];

        // Simpan data
        if (!$this->penghuniModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->penghuniModel->errors());
        }


        // ---------------------------------------------------
        // Tambah Penyewaan
        // ---------------------------------------------------

        $idPenghuni = db_connect()->insertID();
        $idKamar = $this->kamarModel->where('id_tipe', $this->request->getVar('tipe'))->first()['id'];

        // Ambil data dari hasil input
        $data = [
            'id_kamar'        => $idKamar,
            'id_penghuni'     => $idPenghuni,
            'id_user'         => user_id(),
            'jumlah_penghuni' => $this->request->getVar('jumlah_penghuni'),
            'tanggal_masuk'   => $this->request->getVar('tanggal_masuk'),
            'tanggal_keluar'  => $this->request->getVar('tanggal_keluar'),
            'durasi'          => $this->request->getVar('durasi'),
            'status'          => 2,
            'biaya_sewa'      => $this->request->getVar('biaya_sewa'),
        ];

        // Simpan data
        if (!$this->penyewaanModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->penyewaanModel->errors());
        }


        // ---------------------------------------------------
        // Tambah Pembayaran
        // ---------------------------------------------------

        $idPenyewaan = db_connect()->insertID();

        // Ambil data dari hasil input
        $data = [
            'id_penyewaan'  => $idPenyewaan,
            'id_pembayaran' => generateRandomString(),
            'id_metode'     => $this->request->getVar('metode'),
            'total'         => $this->request->getVar('biaya_sewa'),
            'status'        => 2,
        ];

        // Simpan data
        if (!$this->pembayaranModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->pembayaranModel->errors());
        }

        $idPembayaran = db_connect()->insertID();
        return redirect()->to('user/pembayaran/' . $idPembayaran);
    }

    public function batalkanSewa($id)
    {
        if (!$this->penyewaanModel->save(['id' => $id, 'status' => 3])) {
            return redirect()->back()->with('errors', $this->penyewaanModel->errors());
        }

        return redirect()->to('user/kost/');
    }


    public function pembayaran($id)
    {
        $data = [
            'judul' => 'Pembayaran',
        ];

        $data['pembayaran'] = $this->pembayaranModel->getPembayaran($id);
        $data['metode'] = $this->metodePembayaranModel->getMetode($data['pembayaran']['id_metode']);

        return view('user/pembayaran', $data);
    }

    public function prosesPembayaran($id)
    {
        $rules = [
            'bukti' => [
                'rules' => 'uploaded[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/gif,image/png]|max_size[bukti,5000]',
                'label' => 'Bukti Pembayaran'
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $buktiPembayaran = uploadFile($this->request->getFile('bukti'), 'assets/img/bukti/');

        // Ambil data dari hasil input
        $data = [
            'id' => $id,
            'bukti_pembayaran' => $buktiPembayaran,
            'status' => 4,
        ];

        // Simpan data
        if (!$this->pembayaranModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->pembayaranModel->errors());
        }

        return redirect()->to('user/kost');
    }

    public function kost()
    {
        $data = [
            'judul' => 'Kost Saya',
        ];

        $data['penyewaan']  = $this->penyewaanModel->whereIn('status', [1, 2])->where('id_user', user_id())->first();
        $data['riwayat']    = $this->penyewaanModel->whereIn('status', [3, 4])->where('id_user', user_id())->orderBy('id', 'desc')->find();

        if ($data['penyewaan']) {
            $data['pembayaran'] = $this->pembayaranModel->where('id_penyewaan', $data['penyewaan']['id'])->first();
            $data['penghuni']   = $this->penghuniModel->where('id', $data['penyewaan']['id_penghuni'])->first();
            $data['kamar']      = $this->kamarModel->where('id', $data['penyewaan']['id_kamar'])->first();
            $data['tipe']       = $this->kamarTipeModel->where('id', $data['kamar']['id_tipe'])->first();
        }

        return view('user/kost', $data);
    }

    public function profile()
    {
        $data['judul'] = 'Profile';

        return view('user/profile', $data);
    }

    function _uploadFile($namaInput, $path, $namaFileLama = null)
    {
        $file = $this->request->getFile($namaInput);

        // Jika tidak ada gambar diupload
        if ($file->getError() == 4) {
            return $namaFileLama;
        }

        // Buat nama random
        $namaFile = $file->getRandomName();

        // Upload ke path tujuan
        $file->move($path, $namaFile);

        // Hapus file lama
        if ($namaFileLama != null) {
            unlink($path . $namaFileLama);
        }

        return $namaFile;
    }
}
