<?php

namespace App\Controllers;

class Penyewaan extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Penyewaan',
            'penyewaan' => $this->penyewaanModel->getPenyewaan(),
        ];

        $data['empty'] = count($data['penyewaan']) == 0 ? true : false;
        $data['fixtable'] = count($data['penyewaan']) < 3 ? true : false;

        return view('penyewaan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Data Penyewaan',
            'tipe' => $this->kamarTipeModel->getTipe(),
            'kamar' => $this->kamarModel->getKamarTersedia(),
            'metode' => $this->metodePembayaranModel->getMetode(),
            'penghuni' => $this->penghuniModel->getPenghuniTersedia(),
            'validation' => \Config\Services::validation(),
        ];

        return view('penyewaan/tambah', $data);
    }

    public function simpan()
    {
        // Validasi
        $rules = [
            'penghuni' => [
                'rules' => 'required',
                'label' => 'Penghuni'
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
            'metode' => [
                'rules' => 'required',
                'label' => 'Metode'
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // ---------------------------------------------------
        // Tambah Penyewaan
        // ---------------------------------------------------
        $idKamar = $this->kamarModel->where('id_tipe', $this->request->getVar('tipe'))->where('status', 1)->first()['id'];

        // Ambil data dari hasil input
        $data = [
            'id_kamar'        => $idKamar,
            'id_penghuni'     => $this->request->getVar('penghuni'),
            'id_user'         => user_id(),
            'jumlah_penghuni' => $this->request->getVar('jumlah_penghuni'),
            'tanggal_masuk'   => $this->request->getVar('tanggal_masuk'),
            'tanggal_keluar'  => $this->request->getVar('tanggal_keluar'),
            'durasi'          => $this->request->getVar('durasi'),
            'status'          => $this->request->getVar('status'),
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
            'id_pembayaran' => generateRandomString(),
            'id_penyewaan' => $idPenyewaan,
            'id_metode'    => $this->request->getVar('metode'),
            'total'        => $this->request->getVar('biaya_sewa'),
            'status'       => 2,
        ];

        // Simpan data
        if (!$this->pembayaranModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->pembayaranModel->errors());
        }


        // ---------------------------------------------------
        // Ubah Status
        // ---------------------------------------------------

        // Kamar
        $data = [
            'id'         => $idKamar,
            'status'     => 2,
        ];
        if (!$this->kamarModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->kamarModel->errors());
        }

        // Penghuni
        $data = [
            'id'       => $this->request->getVar('penghuni'),
            'status'     => 2,
        ];
        if (!$this->penghuniModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->penghuniModel->errors());
        }

        return redirect()->to('penyewaan/');
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Ubah Data Penyewaan',
            'tipe' => $this->kamarTipeModel->getTipe(),
            'kamar' => $this->kamarModel->getKamarTersedia(),
            'penghuni' => $this->penghuniModel->getPenghuniTersedia(),
            'penyewaan' => $this->penyewaanModel->getPenyewaan($id),
            'metode' => $this->metodePembayaranModel->getMetode(),
            'validation' => \Config\Services::validation(),
        ];

        $data['pembayaran'] = $this->pembayaranModel->where('id_penyewaan', $data['penyewaan']['id'])->first();
        $data['kamarLama'] = $this->kamarModel->where('id', $data['penyewaan']['id_kamar'])->first();

        return view('penyewaan/edit', $data);
    }

    public function update($id)
    {
        // Validasi
        $rules = [
            'penghuni' => [
                'rules' => 'required',
                'label' => 'Penghuni'
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
            'metode' => [
                'rules' => 'required',
                'label' => 'Metode'
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // ---------------------------------------------------
        // Tambah Penyewaan
        // ---------------------------------------------------
        // Ambil data dari hasil input
        $data = [
            'id'              => $id,
            'id_kamar'        => $this->request->getVar('kamar'),
            'id_penghuni'     => $this->request->getVar('penghuni'),
            'jumlah_penghuni' => $this->request->getVar('jumlah_penghuni'),
            'tanggal_masuk'   => $this->request->getVar('tanggal_masuk'),
            'tanggal_keluar'  => $this->request->getVar('tanggal_keluar'),
            'durasi'          => $this->request->getVar('durasi'),
            'status'          => $this->request->getVar('status'),
            'biaya_sewa'      => $this->request->getVar('biaya_sewa'),
        ];
        // Simpan data
        if (!$this->penyewaanModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->penyewaanModel->errors());
        }


        // ---------------------------------------------------
        // Tambah Pembayaran
        // ---------------------------------------------------

        $idPembayaran = $this->pembayaranModel->where('id_penyewaan', $id)->first();
        // Ambil data dari hasil input
        $data = [
            'id'           => $idPembayaran,
            'id_penyewaan' => $id,
            'id_metode'    => $this->request->getVar('metode'),
            'total'        => $this->request->getVar('biaya_sewa'),
        ];

        // Simpan data
        if (!$this->pembayaranModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->pembayaranModel->errors());
        }

        // ---------------------------------------------------
        // Ubah Status
        // ---------------------------------------------------
        $status = $this->request->getVar('status');
        if ($status == 1) {
            $status = 3;
        } else if ($status == 2) {
            $status = 2;
        } else if ($status == 3) {
            $status = 1;
        } else {
            $status = 4;
        }

        // Kamar
        $data = [
            'id'         => $this->request->getVar('kamar'),
            'status'     => $status,
        ];
        if (!$this->kamarModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->kamarModel->errors());
        }

        // Penghuni
        $data = [
            'id'       => $this->request->getVar('penghuni'),
            'status'     => $status,
        ];
        if (!$this->penghuniModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->penghuniModel->errors());
        }

        return redirect()->to('penyewaan/');
    }

    public function hapus($id)
    {
        $penyewaan = $this->penyewaanModel->getPenyewaan($id);
        $penghuni = $penyewaan['id_penghuni'];
        $kamar = $penyewaan['id_kamar'];

        // Hapus data
        if (!$this->penyewaanModel->deletePenyewaan($id)) {
            return redirect()->to('penyewaan')->with('errors', $this->penyewaanModel->errors());
        }

        // Ubah status penghuni
        $data = [
            'id' => $penghuni,
            'status' => 1,
        ];
        if (!$this->penghuniModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->penghuniModel->errors());
        }

        // Ubah status kamar
        $data = [
            'id' => $kamar,
            'status' => 1,
        ];

        if (!$this->kamarModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->kamarModel->errors());
        }

        return redirect()->to('penyewaan')->with('message', 'Data berhasil dihapus');
    }
}
