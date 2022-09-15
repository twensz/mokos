<?php

namespace App\Controllers;

class Pembayaran extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Pembayaran',
            'pembayaran' => $this->pembayaranModel->getPembayaran(),
        ];

        $data['empty'] = count($data['pembayaran']) == 0 ? true : false;
        $data['fixtable'] = count($data['pembayaran']) < 3 ? true : false;

        return view('pembayaran/index', $data);
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Tambah data pembayaran',
            'pembayaran' => $this->pembayaranModel->getPembayaran(),
            'metode' => $this->metodePembayaranModel->getMetode(),
            'validation' => \Config\Services::validation(),
        ];

        return view('pembayaran/tambah', $data);
    }

    public function edit($idPembayaran)
    {
        $data = [
            'judul' => 'Ubah data pembayaran',
            'pembayaran' => $this->pembayaranModel->getPembayaran($idPembayaran),
            'metode' => $this->metodePembayaranModel->getMetode(),
            'validation' => \Config\Services::validation(),
        ];

        return view('pembayaran/edit', $data);
    }

    public function update($idPembayaran)
    {
        // Validasi
        $rules = [
            'bukti' => [
                'rules' => 'mime_in[bukti,image/jpg,image/jpeg,image/gif,image/png]|max_size[bukti,5000]',
                'label' => 'Bukti pembayaran'
            ],
            'total' => [
                'rules' => 'required',
                'label' => 'Total'
            ],
            'status' => [
                'rules' => 'required',
                'label' => 'Status'
            ],
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $bukti = uploadFile($this->request->getFile('bukti'), 'assets/img/bukti/',  $this->request->getVar('buktiLama'));

        $data = [
            'id'                => $idPembayaran,
            'bukti_pembayaran'  => $bukti,
            'total'             => $this->request->getVar('total'),
            'status'            => $this->request->getVar('status'),
        ];

        if (!$this->pembayaranModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->pembayaranModel->errors());
        }

        return redirect()->to('pembayaran')->with('message', 'Data berhasil diubah');
    }

    public function hapus($idPembayaran)
    {
        // Hapus data
        if (!$this->pembayaranModel->deletePembayaran($idPembayaran)) {
            return redirect()->to('pembayaran')->with('errors', $this->pembayaranModel->errors());
        }

        return redirect()->to('pembayaran')->with('message', 'Data berhasil dihapus');
    }

    public function konfirmasi($id)
    {
        if (!$this->pembayaranModel->save(['id' => $id, 'status' => 1])) {
            return redirect()->back()->with('errors', $this->pembayaranModel->errors());
        };

        return redirect()->to('pembayaran')->with('message', 'Berhasil dikonfirmasi');
    }
}
