<?php

use App\Models\KamarTipeModel;
use App\Models\KamarModel;
use App\Models\PenghuniModel;
use App\Models\PembayaranModel;

function badgeStatusKamar($status)
{
    if ($status == 1) {
        return '<span class="badge bg-label-success me-1">Tersedia</span>';
    } else if ($status == 2) {
        return '<span class="badge bg-label-warning me-1">Dibooking</span>';
    } else if ($status == 3) {
        return '<span class="badge bg-label-danger me-1">Dihuni</span>';
    } else {
        return '<span class="badge bg-label-secondary me-1">Tidak Tersedia</span>';
    }
}

function badgeMetode($status)
{
    if ($status == 1) {
        return '<span class="badge bg-label-success me-1">Aktif</span>';
    } else {
        return '<span class="badge bg-label-secondary me-1">Tidak Aktif</span>';
    }
}

function badgeStatusTipe($status)
{
    if ($status == 1) {
        return '<span class="badge bg-label-success me-1">Aktif</span>';
    } else if ($status == 2) {
        return '<span class="badge bg-label-danger me-1">Penuh</span>';
    } else {
        return '<span class="badge bg-label-secondary me-1">Tidak Aktif</span>';
    }
}

function badgeStatusPenghuni($status)
{
    if ($status == 1) {
        return '<span class="badge bg-label-success me-1">Tersedia</span>';
    } else if ($status == 2) {
        return '<span class="badge bg-label-warning me-1">Booking</span>';
    } else if ($status == 3) {
        return '<span class="badge bg-label-danger me-1">Menghuni</span>';
    } else {
        return '<span class="badge bg-label-secondary me-1">Keluar</span>';
    }
}

function badgeStatusSewa($status)
{
    if ($status == 1) {
        return '<span class="badge bg-label-success me-1">Sedang Berjalan</span>';
    } else if ($status == 2) {
        return '<span class="badge bg-label-warning me-1">Booking</span>';
    } else if ($status == 3) {
        return '<span class="badge bg-label-danger me-1">Dibatalkan</span>';
    } else {
        return '<span class="badge bg-label-secondary me-1">Selesai</span>';
    }
}

function badgeStatusPembayaran($status)
{
    if ($status == 1) {
        return '<span class="badge bg-label-success me-1">Berhasil</span>';
    } else if ($status == 2) {
        return '<span class="badge bg-label-warning me-1">Pending</span>';
    } else if ($status == 3) {
        return '<span class="badge bg-label-danger me-1">Dibatalkan</span>';
    } else if ($status == 4) {
        return '<span class="badge bg-label-info me-1">Menunggu Konfirmasi</span>';
    }
}



function getTipeKamar($id)
{
    $kamarTipeModel = new KamarTipeModel();
    $tipe = $kamarTipeModel->getTipe($id);

    return $tipe;
}

function getPenghuni($id)
{
    $penghuniModel = new PenghuniModel();
    $penghuni = $penghuniModel->getAllPenghuni($id);

    return $penghuni;
}

function getKamar($id)
{
    $kamarModel = new KamarModel();
    $kamar = $kamarModel->find($id);

    return $kamar;
}

function getKamarByTipe($id)
{
    $kamarModel = new KamarModel();
    $kamar = $kamarModel->where('tipe', $id)->findAll;

    return $kamar;
}

function getPembayaranByPenyewaan($id)
{
    $pembayaranModel = new PembayaranModel();
    $result = $pembayaranModel->where(['id_penyewaan' => $id])->first();

    return $result;
}

function getAllPembayaran($id)
{
    $pembayaranModel = new PembayaranModel();
    $result = $pembayaranModel->getAllPembayaran($id);

    return $result;
}

function getRole()
{
    $roles = user()->getRoles();
    foreach ($roles as $r) {
        return $r;
    }
}



function tampilkanData($data)
{
    if (!$data) {
        return 'Data tidak tersedia';
    }
    return $data;
}

function formatTanggal($waktu)
{
    $date = new DateTime($waktu);
    $result = $date->format('d-m-Y');

    return $result;
}

function formatWaktu($waktu, $waktu2 = null)
{
    if ($waktu2 != null) {
        $date = new DateTime($waktu);
        $result = $date->format('j M');

        $date = new DateTime($waktu2);
        $result2 = $date->format('j M, Y');

        return $result . " - " . $result2;
    }

    $date = new DateTime($waktu);
    $result = $date->format('j M Y, h:i a');

    return $result;
}

function formatRupiah($nominal)
{
    $result = number_format($nominal, 0, ".", ",");
    return 'Rp. ' . $result;
}

function generateRandomString($length = 8)
{
    // return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

function generateRandomNumber($length = 8)
{
    return substr(str_shuffle(str_repeat($x = '0123456789', ceil($length / strlen($x)))), 1, $length);
}

function uploadFile($file, $path, $namaFileLama = null)
{
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
