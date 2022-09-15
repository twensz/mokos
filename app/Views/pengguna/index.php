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
            <h5 class="my-auto">Pengguna</h5>
            <a href="<?= base_url('/pengguna/tambah'); ?>" class="btn btn-primary">Tambah Pengguna</a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php foreach ($user as $user) : ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('assets/img/avatars/' . $user['gambar']); ?>" alt="user-avatar" class="d-block rounded" height="50" width="50" id="uploadedAvatar" />
                            </td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                            Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>