<?php

namespace App\Controllers;

class Kamar extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Kamar',
            'kamar' => $this->kamarModel->getKamar(),
        ];

        $data['empty'] = count($data['kamar']) == 0 ? true : false;
        $data['fixtable'] = count($data['kamar']) < 3 ? true : false;

        return view('kamar/index', $data);
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Kamar',
            'validation' => \Config\Services::validation(),
            'tipe' => $this->kamarTipeModel->getTipe(),
        ];

        return view('kamar/tambah', $data);
    }

    public function simpan()
    {
        // Validasi
        $rules = [
            'nomor' => [
                'label' => 'Nomor Kamar',
                'rules' => 'required|is_unique[kamar.nomor]',
            ],
            'tipe' => [
                'label' => 'Tipe Kamar',
                'rules' => 'required',
            ],
            'status' => [
                'label' => 'Status Kamar',
                'rules' => 'required',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data
        $data = [
            'nomor' => $this->request->getVar('nomor'),
            'id_tipe' => $this->request->getVar('tipe'),
            'status' => $this->request->getVar('status'),
        ];

        // Simpan data
        if (!$this->kamarModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->kamarModel->errors());
        }

        return redirect()->to('kamar')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Kamar',
            'kamar' => $this->kamarModel->getKamar($id),
            'tipe' => $this->kamarTipeModel->getTipe(),
            'validation' => \Config\Services::validation(),
        ];

        return view('kamar/edit', $data);
    }

    public function update($id)
    {
        // Mengatasi is_unique
        $kamar = $this->kamarModel->find($id);
        if ($kamar['nomor'] == $this->request->getVar('nomor')) {
            $ruleNomor = 'required';
        } else {
            $ruleNomor = 'required|is_unique[kamar.nomor]';
        }

        // Validasi
        $rules = [
            'nomor' => [
                'label' => 'Nomor Kamar',
                'rules' => $ruleNomor,
            ],
            'tipe' => [
                'label' => 'Tipe Kamar',
                'rules' => 'required',
            ],
            'status' => [
                'label' => 'Status Kamar',
                'rules' => 'required',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data
        $data = [
            'id'        => $id,
            'nomor'     => $this->request->getVar('nomor'),
            'id_tipe'   => $this->request->getVar('tipe'),
            'status'    => $this->request->getVar('status'),
        ];

        // Simpan data
        if (!$this->kamarModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->kamarModel->errors());
        }

        return redirect()->to('kamar')->with('message', 'Data berhasil diubah');
    }

    public function hapus($id)
    {
        // Hapus data
        if (!$this->kamarModel->deleteKamar($id)) {
            return redirect()->to('kamar')->with('errors', $this->kamarModel->errors());
        }

        return redirect()->to('kamar')->with('message', 'Data berhasil dihapus');
    }
}
