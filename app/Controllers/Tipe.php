<?php

namespace App\Controllers;

class Tipe extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Tipe Kamar',
            'tipe' => $this->kamarTipeModel->getTipe(),
        ];

        $data['empty'] = count($data['tipe']) == 0 ? true : false;
        $data['fixtable'] = count($data['tipe']) < 3 ? true : false;

        return view('kamar/tipe/index', $data);
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Tipe Kamar',
            'validation' => \Config\Services::validation(),
        ];

        return view('kamar/tipe/tambah', $data);
    }

    public function simpan()
    {
        // Validasi
        $rules = [
            'nama' => [
                'label' => 'Nama Tipe',
                'rules' => 'required|is_unique[kamar_tipe.nama]'
            ],
            'status' => [
                'label' => 'Status Tipe',
                'rules' => 'required'
            ],
            'harga' => [
                'label' => 'Harga Tipe',
                'rules' => 'required'
            ],
            'fasilitas' => [
                'label' => 'Fasilitas Kamar',
                'rules' => 'required'
            ],
            'gambar' => [
                'label' => 'Gambar Tipe',
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2500]'
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambar = $this->request->getFile('gambar');
        $gambar = uploadFile($gambar, 'assets/img/tipe/');

        // Ambil data dari hasil input
        $data = [
            'nama'      => $this->request->getVar('nama'),
            'fasilitas' => $this->request->getVar('fasilitas'),
            'gambar'    => $gambar,
            'harga'     => $this->request->getVar('harga'),
            'status'    => $this->request->getVar('status'),
        ];

        // Simpan data
        if (!$this->kamarTipeModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->kamarTipeModel->errors());
        }

        return redirect()->to('/tipe/index')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Edit Tipe Kamar',
            'tipe' => $this->kamarTipeModel->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('kamar/tipe/edit', $data);
    }

    public function update($id)
    {
        // Mengatasi is_unique
        $tipe = $this->kamarTipeModel->find($id);
        if ($tipe['nama'] == $this->request->getVar('nama')) {
            $ruleNama = 'required';
        } else {
            $ruleNama = 'required|is_unique[kamar_tipe.nama]';
        }

        // Validasi
        $rules = [
            'nama' => [
                'label' => 'Nama Tipe',
                'rules' => $ruleNama
            ],
            'status' => [
                'label' => 'Status Tipe',
                'rules' => 'required'
            ],
            'harga' => [
                'label' => 'Harga Tipe',
                'rules' => 'required'
            ],
            'fasilitas' => [
                'label' => 'Fasilitas Kamar',
                'rules' => 'required'
            ],
            'gambar' => [
                'label' => 'Gambar Tipe',
                'rules' => 'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2500]'
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambar = $this->request->getFile('gambar');
        $gambar = uploadFile($gambar, 'assets/img/tipe/', $tipe['gambar']);

        // Ambil data dari hasil input
        $data = [
            'id'        => $id,
            'nama'      => $this->request->getVar('nama'),
            'fasilitas' => $this->request->getVar('fasilitas'),
            'gambar'    => $gambar,
            'harga'     => $this->request->getVar('harga'),
            'status'    => $this->request->getVar('status'),
        ];

        // Simpan data
        if (!$this->kamarTipeModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->kamarTipeModel->errors());
        }

        return redirect()->to('tipe')->with('message', 'Data berhasil diubah');
    }

    public function hapus($id)
    {
        // Tidak bisa menghapus jika kamar tidak kosong
        $isEmpty = $this->kamarTipeModel->isTipeKosong($id);

        if (!$isEmpty) {
            return redirect()->to('tipe')->with('errors', 'Tidak bisa menghapus, karena ada kamar yang dihuni/dibooking');
        }

        // Hapus data kamar setipe
        $this->kamarModel->deleteKamarByTipe($id);

        // Hapus data tipe
        if (!$this->kamarTipeModel->deleteTipe($id)) {
            return redirect()->to('tipe')->with('errors', $this->kamarTipeModel->errors());
        }

        return redirect()->to('tipe')->with('message', 'Data berhasil dihapus');
    }
}
