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

        <?php if (session()->has('errors')) : ?>
            <div class="card-header pb-0">
                <div class="alert alert-dismissible alert-danger" role="alert">
                    <?= session('errors') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        <?php endif; ?>

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="my-auto">Tipe Kamar</h5>
            <a href="<?= base_url('/tipe/tambah'); ?>" class="btn btn-primary">Tambah Tipe</a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Tipe Kamar</th>
                        <th>Fasilitas</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                    <?php $i = 1;  ?>
                    <?php foreach ($tipe as $tipe) : ?>
                        <tr>
                            <td><?= $i++;  ?></td>
                            <td>
                                <img class="" height="100" width="150" style="object-fit: cover;" src="<?= base_url('assets/img/tipe/' . $tipe['gambar']);  ?>" alt="$tipe['gambar'])">
                            </td>
                            <td><?= $tipe['nama']; ?></td>
                            <td><?= $tipe['fasilitas']; ?></td>
                            <td><?= formatRupiah($tipe['harga']); ?></td>
                            <td><?= badgeStatusTipe($tipe['status']); ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url('/tipe/edit/' . $tipe['id']); ?>">
                                            <i class="bx bx-edit-alt me-1"></i> Ubah
                                        </a>
                                        <a class="dropdown-item" href="<?= base_url('/tipe/hapus/' . $tipe['id']); ?>">
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