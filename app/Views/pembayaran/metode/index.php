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
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Metode</th>
                        <th>Bank</th>
                        <th>Nomor Rekening</th>
                        <th>Atas Nama</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $i = 1;  ?>
                    <?php foreach ($metode as $metode) : ?>
                        <tr>
                            <td><?= $i++;  ?></td>
                            <td><?= $metode['nama_metode']  ?></td>
                            <td><?= strtoupper($metode['nama_bank'])  ?></td>
                            <td><?= $metode['nomor_rekening']  ?></td>
                            <td><?= $metode['atas_nama']  ?></td>
                            <td><?= badgeMetode($metode['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>