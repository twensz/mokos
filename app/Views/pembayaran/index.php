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
            <h5 class="my-auto"><?= $judul;  ?></h5>
            <a href="<?= base_url('/pembayaran/tambah'); ?>" class="btn btn-primary">Tambah Pembayaran</a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID Pembayaran</th>
                        <th>Waktu</th>
                        <th>Total</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php foreach ($pembayaran as $pembayaran) : ?>
                        <tr>
                            <td><span class="text-primary">#<?= $pembayaran['id_pembayaran'] ?></span></td>
                            <td><?= formatWaktu($pembayaran['created_at']) ?></td>
                            <td><?= formatRupiah($pembayaran['total']) ?></td>
                            <td>
                                <?php if ($pembayaran['bukti_pembayaran']) : ?>
                                    <a target="_blank" href="<?= base_url('/assets/img/bukti/' . $pembayaran['bukti_pembayaran']);  ?>">
                                        <i class='bx bx-file text-primary'></i>
                                    </a>
                                <?php else : ?>
                                    <i class='bx bx-file text-secondary'></i>
                                <?php endif;  ?>
                            </td>
                            <td>
                                <?php if ($pembayaran['status'] == 4 || $pembayaran['status'] == 2) :  ?>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#konfirmasiModal<?= $pembayaran['id'] ?>">
                                        <?= badgeStatusPembayaran($pembayaran['status']) ?>
                                    </a>

                                    <!-- Modal Konfirmasi -->
                                    <div class="modal fade" id="konfirmasiModal<?= $pembayaran['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Konfirmasi Modal</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col text-wrap">
                                                            Apakah anda yakin ingin mengkonfirmasi pembayaran?
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <a href="<?= base_url('pembayaran/konfirmasi/' . $pembayaran['id']);  ?>" type="button" class="btn btn-primary">Konfirmasi</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <?= badgeStatusPembayaran($pembayaran['status']) ?>
                                <?php endif;  ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url('pembayaran/edit/' . $pembayaran['id']);  ?>"><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                                        <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#konfirmasiHapusModal<?= $pembayaran['id'] ?>"><i class="bx bx-trash me-1"></i>
                                            Hapus</a>
                                    </div>
                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="konfirmasiHapusModal<?= $pembayaran['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col text-wrap">
                                                            Apakah anda yakin ingin menghapus pembayaran?
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <a href="<?= base_url('pembayaran/hapus/' . $pembayaran['id']);  ?>" type="button" class="btn btn-primary">Konfirmasi</a>
                                                </div>
                                            </div>
                                        </div>
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
                    <h5 class="fw-normal">Belum ada pembayaran</h5>
                </div>
            <?php endif;  ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>