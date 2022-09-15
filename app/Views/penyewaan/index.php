<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <!-- Pesan aksi -->
        <?php if (session()->has('message')) : ?>
            <div class="card-header pb-0">
                <div class="alert alert-dismissible alert-success" role="alert">
                    <?= session('message') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="my-auto">Penyewaan</h5>
            <a href="<?= base_url('/penyewaan/tambah'); ?>" class="btn btn-primary">Tambah data</a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Penghuni</th>
                        <th>Jumlah Penghuni</th>
                        <th>Tipe</th>
                        <th>Kamar</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Sewa</th>
                        <th>ID Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Status Sewa</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                    <?php $i = 1;  ?>
                    <?php foreach ($penyewaan as $penyewaan) : ?>
                        <?php
                        $penghuni = getPenghuni($penyewaan['id_penghuni']);
                        $kamar = getKamar($penyewaan['id_kamar']);
                        $tipe = getTipeKamar($kamar['id_tipe']);
                        $pembayaran = getPembayaranByPenyewaan($penyewaan['id']);
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <?php if ($penghuni) :  ?>
                                    <?= $penghuni['nama'];  ?>
                                <?php else :  ?>
                                    Data Tidak Tersedia
                                <?php endif;  ?>
                            </td>
                            <td><?= $penyewaan['jumlah_penghuni'] ?></td>
                            <td>
                                <?php if ($tipe) :  ?>
                                    <?= $tipe['nama'];  ?>
                                <?php else :  ?>
                                    Data Tidak Tersedia
                                <?php endif;  ?>
                            </td>
                            <td>
                                <?php if ($kamar) :  ?>
                                    <?= $kamar['nomor'];  ?>
                                <?php else :  ?>
                                    Data Tidak Tersedia
                                <?php endif;  ?>
                            </td>
                            <td><?= formatTanggal($penyewaan['tanggal_masuk']) ?></td>
                            <td><?= formatTanggal($penyewaan['tanggal_keluar']) ?></td>
                            <td><?= formatRupiah($penyewaan['biaya_sewa']) ?></td>
                            <td><span class="text-primary">#<?= $pembayaran['id_pembayaran'] ?></span></td>
                            <td><?= badgeStatusPembayaran($pembayaran['status']) ?></td>
                            <td><?= badgeStatusSewa($penyewaan['status']) ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url('/penyewaan/edit/' . $penyewaan['id']); ?>">
                                            <i class="bx bx-edit-alt me-1"></i> Ubah
                                        </a>
                                        <a class="dropdown-item" href="<?= base_url('/penyewaan/hapus/' . $penyewaan['id']); ?>">
                                            <i class="bx bx-trash me-1"></i> Hapus
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <!-- Fix dropdown menu -->
                    <?php if ($fixtable && !$empty) : ?><tr height="100px"></tr><?php endif; ?>
                </tbody>
            </table>
            <?php if ($empty) : ?>
                <div class="row g-0 my-auto py-5 justify-content-center text-center">
                    <i class='bx bxs-x-circle bx-md mb-2'></i>
                    <h5 class="fw-normal">Belum ada penyewaan</h5>
                </div>
            <?php endif;  ?>
        </div>


    </div>
</div>
<?= $this->endSection(); ?>