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
            <h5 class="my-auto">Penghuni</h5>
            <a href="<?= base_url('/penghuni/tambah'); ?>" class="btn btn-primary">Tambah Penghuni</a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>KTP</th>
                        <th>KK</th>
                        <th>Buku Nikah</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $i = 1;  ?>
                    <?php foreach ($penghuni as $penghuni) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $penghuni['nama'] ?></td>
                            <td>
                                <?php if ($penghuni['ktp']) : ?>
                                    <a target="_blank" href="<?= base_url('/assets/img/dokumen/ktp/' . $penghuni['ktp']);  ?>">
                                        <i class='bx bx-file text-primary'></i>
                                    </a>
                                <?php else : ?>
                                    <i class='bx bx-file text-secondary'></i>
                                <?php endif;  ?>

                            </td>
                            <td>
                                <?php if ($penghuni['kk']) : ?>
                                    <a target="_blank" href="<?= base_url('/assets/img/dokumen/kk/' . $penghuni['kk']);  ?>">
                                        <i class='bx bx-file text-primary'></i>
                                    </a>
                                <?php else : ?>
                                    <i class='bx bx-file text-secondary'></i>
                                <?php endif;  ?>
                            </td>
                            <td>
                                <?php if ($penghuni['buku_nikah']) : ?>
                                    <a target="_blank" href="<?= base_url('/assets/img/dokumen/bn/' . $penghuni['buku_nikah']);  ?>">
                                        <i class='bx bx-file text-primary'></i>
                                    </a>
                                <?php else : ?>
                                    <i class='bx bx-file text-secondary'></i>
                                <?php endif;  ?>
                            </td>
                            <td>
                                <?= badgeStatusPenghuni($penghuni['status']); ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url('/penghuni/edit/' . $penghuni['id']); ?>">
                                            <i class="bx bx-edit-alt me-1"></i> Ubah
                                        </a>
                                        <a class="dropdown-item" href="<?= base_url('/penghuni/hapus/' . $penghuni['id']); ?>">
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
                    <h5 class="fw-normal">Belum ada penghuni</h5>
                </div>
            <?php endif;  ?>
        </div>


    </div>
</div>
<?= $this->endSection(); ?>