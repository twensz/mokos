<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-4">
        <h5 class="card-header">Tambah data pengguna</h5>

        <hr class="my-0" />
        <div class="card-body">
            <form id="formAccountSettings" method="POST" action="<?= route_to('update') ?>">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" id="username" name="username" value="<?= old('username') ?>" placeholder="Masukan nama lengkap" autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukan Email" value="<?= old('email') ?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="password">Kata Sandi</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="off" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="pass_confirm">Konfirmasi Kata Sandi</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="pass_confirm" autocomplete="off" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /Akun -->
    </div>

</div>

<?= $this->endSection(); ?>