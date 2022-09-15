<?= $this->extend('templates/index_user'); ?>

<?= $this->section('content'); ?>

<div class="container container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        Kos Saya
    </h4>

    <!-- Pesan Kesalahan -->
    <?= view('Myth\Auth\Views\_message_block') ?>

    <div class="card mb-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="my-auto">Kamar saat ini</h5>
        </div>
        <?php if (!$penyewaan) { ?>
            <div class="row g-0 my-auto py-5 justify-content-center text-center">
                <i class='bx bxs-x-circle bx-md mb-2'></i>
                <h5 class="fw-normal">Belum ada kamar yang anda pesan</h5>
                <div class="col-auto mt-3">
                    <a href="<?= base_url('user/sewa');  ?>" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        <?php  } else { ?>
            <div class="row g-0">
                <div class="col-md-5">
                    <img class="card-img ms-2" height="300" width="150" style="object-fit: cover;" src="<?= base_url('/assets/img/tipe/' . $tipe['gambar']); ?>" alt="<?= $tipe['gambar'];  ?>" />
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title d-inline me-2">Tipe <?= $tipe['nama'];  ?> - <?= $kamar['nomor'];  ?></h5>
                        <?= badgeStatusSewa($penyewaan['status']);  ?>

                        <p class="card-text mt-2">
                            Fasilitas :
                            <?= $tipe['fasilitas'];  ?>
                        </p>

                        <div class="row g-2">
                            <div class="col-auto">
                                <div class="mb-2">Penghuni</div>
                                <div class="h5"><?= $penghuni['nama'];  ?></div>
                            </div>
                            <div class="col-auto ms-5">
                                <div class="mb-2">Jumlah</div>
                                <div class="h5"><?= $penyewaan['jumlah_penghuni'];  ?> Orang</div>
                            </div>
                            <div class="col-auto ms-5">
                                <div class="mb-2">Waktu</div>
                                <div class="h5">
                                    <?= formatWaktu($penyewaan['tanggal_masuk'], $penyewaan['tanggal_keluar']);  ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="mb-2">Dipesan pada : <?= formatWaktu($pembayaran['created_at'])  ?></div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">Status Pembayaran : <?= badgeStatusPembayaran($pembayaran['status'])  ?></div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 mt-2">
                                <?php if ($pembayaran['status'] == 2) {  ?>
                                    <a href="<?= base_url('user/pembayaran/' . $pembayaran['id']);  ?>" class="btn btn-primary w-100">Bayar</a>
                                <?php } else {   ?>
                                    <a href="<?= base_url('user/pembayaran/' . $pembayaran['id']);  ?>" class="btn btn-primary w-100">Lihat Invoice</a>
                                <?php } ?>
                            </div>
                            <div class="col-md-6 mt-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#konfirmasiModal<?= $penyewaan['id'] ?>" class="btn btn-danger w-100">Batalkan Sewa</a>

                                <!-- Modal Konfirmasi -->
                                <div class="modal fade" id="konfirmasiModal<?= $penyewaan['id'] ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Konfirmasi Modal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col text-wrap">
                                                        Apakah anda yakin ingin mengkonfirmasi membatalkan sewa?
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <a href="<?= base_url('user/batalkanSewa/' . $penyewaan['id']);  ?>" type="button" class="btn btn-primary">Batalkan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }  ?>
    </div>

    <!-- Riwayat -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="my-auto">Riwayat Penyewaan Kamar</h5>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Kamar</th>
                        <th>Fasilitas</th>
                        <th>Waktu</th>
                        <th>Sewa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php if ($riwayat) :  ?>
                    <tbody class="table-border-bottom-0">
                        <?php $i = 1;  ?>
                        <?php foreach ($riwayat as $riwayat) : ?>
                            <?php
                            $kamar = getKamar($riwayat['id_kamar']);
                            $tipe = getTipeKamar($kamar['id_tipe']);
                            $penghuni = getPenghuni($riwayat['id_penghuni']);
                            $pembayaran = getPembayaranByPenyewaan($riwayat['id']);
                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td>
                                    <img class="" height="100" width="150" style="object-fit: cover;" src="<?= base_url('assets/img/tipe/' . $tipe['gambar']);  ?>" alt="$tipe['gambar'])">
                                </td>
                                <td>
                                    <?php if ($tipe) :  ?>
                                        <?= $tipe['nama'];  ?> - <?= $kamar['nomor'];  ?>
                                    <?php else :  ?>
                                        Data Tidak Tersedia
                                    <?php endif;  ?>
                                </td>
                                <td><?= $tipe['fasilitas'];  ?></td>
                                <td><?= formatWaktu($riwayat['tanggal_masuk'], $riwayat['tanggal_keluar']) ?></td>
                                <td><?= formatRupiah($riwayat['biaya_sewa']) ?></td>
                                <td><?= badgeStatusSewa($riwayat['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                <?php endif;  ?>
            </table>
            <?php if (!$riwayat) : ?>
                <div class="row g-0 my-auto py-5 justify-content-center text-center">
                    <i class='bx bxs-x-circle bx-md mb-2'></i>
                    <h5 class="fw-normal">Belum ada riwayat kamar</h5>
                </div>
            <?php endif;  ?>
        </div>


    </div>


</div>

<?= $this->endSection(); ?>