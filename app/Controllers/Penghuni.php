<?php

namespace App\Controllers;

class penghuni extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Penghuni',
            'penghuni' => $this->penghuniModel->getPenghuni(),
        ];

        $data['empty'] = count($data['penghuni']) == 0 ? true : false;
        $data['fixtable'] = count($data['penghuni']) < 3 ? true : false;

        return view('penghuni/index', $data);
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Tambah Penghuni',
            'validation' => \Config\Services::validation(),
        ];

        return view('penghuni/tambah', $data);
    }

    public function simpan()
    {
        // Validasi
        $rules = [
            'nama' => [
                'rules' => 'required',
                'label' => 'Nama penghuni'
            ],
            'status' => [
                'rules' => 'required',
                'label' => 'Status'
            ],
            'ktp' => [
                'rules' => 'uploaded[ktp]|mime_in[ktp,image/jpg,image/jpeg,image/gif,image/png]|max_size[ktp,800]',
                'label' => 'KTP'
            ],
            'kk' => [
                'rules' => 'uploaded[kk]|mime_in[kk,image/jpg,image/jpeg,image/gif,image/png]|max_size[kk,800]',
                'label' => 'kk'
            ],
            'bn' => [
                'rules' => 'mime_in[bn,image/jpg,image/jpeg,image/gif,image/png]|max_size[bn,800]',
                'label' => 'Buku Nikah'
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload file
        $ktp    = uploadFile($this->request->getFile('ktp'), 'assets/img/dokumen/ktp/');
        $kk     = uploadFile($this->request->getFile('kk'), 'assets/img/dokumen/kk/');
        $bn     = uploadFile($this->request->getFile('bn'), 'assets/img/dokumen/bn/');

        // Ambil data dari hasil input
        $data = [
            'nama' => $this->request->getVar('nama'),
            'status' => $this->request->getVar('status'),
            'ktp' => $ktp,
            'kk' => $kk,
            'buku_nikah' => $bn,
        ];

        // Simpan data
        if (!$this->penghuniModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->penghuniModel->errors());
        }

        return redirect()->to('penghuni')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Edit Data Penghuni',
            'penghuni' => $this->penghuniModel->getPenghuni($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('penghuni/edit', $data);
    }

    public function update($id)
    {
        // Validasi
        $rules = [
            'nama' => [
                'rules' => 'required',
                'label' => 'Nama penghuni'
            ],
            'status' => [
                'rules' => 'required',
                'label' => 'Status'
            ],
            'ktp' => [
                'rules' => 'mime_in[ktp,image/jpg,image/jpeg,image/gif,image/png]|max_size[ktp,800]',
                'label' => 'KTP'
            ],
            'kk' => [
                'rules' => 'mime_in[kk,image/jpg,image/jpeg,image/gif,image/png]|max_size[kk,800]',
                'label' => 'kk'
            ],
            'bn' => [
                'rules' => 'mime_in[bn,image/jpg,image/jpeg,image/gif,image/png]|max_size[bn,800]',
                'label' => 'Buku Nikah'
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload file
        $ktp = uploadFile($this->request->getFile('ktp'), 'assets/img/dokumen/ktp/', $this->request->getVar('ktpLama'));
        $kk = uploadFile($this->request->getFile('kk'), 'assets/img/dokumen/kk/', $this->request->getVar('kkLama'));
        $bn = uploadFile($this->request->getFile('bn'), 'assets/img/dokumen/bn/', $this->request->getVar('bnLama'));

        // Ambil data dari hasil input
        $data = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'status' => $this->request->getVar('status'),
            'ktp' => $ktp,
            'kk' => $kk,
            'buku_nikah' => $bn,
        ];

        // Simpan data
        if (!$this->penghuniModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->penghuniModel->errors());
        }

        return redirect()->to('penghuni')->with('message', 'Data berhasil diubah');
    }

    public function hapus($id)
    {
        // Hapus data
        if (!$this->penghuniModel->deletePenghuni($id)) {
            return redirect()->to('penghuni')->with('errors', $this->penghuniModel->errors());
        }

        return redirect()->to('penghuni')->with('message', 'Data berhasil dihapus');
    }
}
