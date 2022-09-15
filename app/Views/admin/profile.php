<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Detail Profile</h5>

                <?php if (session()->has('message')) : ?>
                    <div class="card-header pb-0 pt-0">
                        <div class="alert alert-dismissible alert-success" role="alert">
                            <?= session('message') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Form edit profile -->
                <form id="formAccountSettings" method="POST" action="<?= route_to('update') ?>" enctype="multipart/form-data">
                    <?php csrf_field(); ?>
                    <div class="card-body pt-1">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <!-- Foto Profil -->
                            <img src="<?= base_url('/assets/img/avatars/' . user()->gambar); ?>" alt="user-avatar" class="d-block rounded" height="150" width="150" id="uploadedAvatar" style="object-fit: cover;" />

                            <!-- Input Gambar -->
                            <div class="input-group">
                                <input type="file" class="form-control" id="gambar" name="gambar">

                                <div class="invalid-feedback d-block mb-2">
                                    <?= session('errors.gambar'); ?>
                                </div>
                                <p class="text-muted mb-0">Format (JPG, GIF or PNG). Ukuran maksimal 2MB</p>
                            </div>

                            <!-- <div class="button-wrapper">
                                <div class="invalid-feedback d-block mb-2">
                                </div>
                                <label for="gambar" class="btn btn-primary me-2 mb-3" tabindex="0">
                                    <span class="d-none d-sm-block">Unggah Foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="gambar" name="gambar" class="account-file-input" hidden />
                                </label>
                                <p class="text-muted mb-0">Format (JPG, GIF or PNG). Ukuran maksimal 2MB</p>
                            </div> -->
                        </div>
                    </div>

                    <hr class="my-0" />

                    <div class="card-body">
                        <!-- Hidden ID -->
                        <input type="hidden" value="<?= user_id(); ?>">

                        <div class="row">

                            <!-- Input Username -->
                            <div class="mb-3 col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" placeholder="Masukan username" value="<?= user()->username; ?>" disabled>
                                <div class="invalid-feedback d-block">
                                    <?= session('errors.username') ?>
                                </div>
                            </div>

                            <!-- Input Email -->
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukan Email" value="<?= user()->email; ?>" disabled>
                                <div class="invalid-feedback d-block">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>

                            <!-- Input Nama -->
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" type="text" id="nama" name="nama" value="<?= user()->nama; ?>" placeholder="Masukan nama lengkap" autofocus />
                                <div class="invalid-feedback d-block">
                                    <?= session('errors.nama') ?>
                                </div>
                            </div>

                            <!-- Input Telepon -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="telepon">Nomor Telepon</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text <?php if (session('errors.telepon')) : ?> border-danger<?php endif ?>">(+62)</span>
                                    <input type="text" class="form-control <?php if (session('errors.telepon')) : ?>is-invalid<?php endif ?>" id="telepon" name="telepon" placeholder="812 3456 7891" value="<?= user()->telepon; ?>" />
                                    <span class="input-group-text"></span>
                                    <div class="invalid-feedback d-block">
                                        <?= session('errors.telepon'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Input Kelamin -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="country">Jenis Kelamin</label>
                                <select id="country" name="kelamin" class="select2 form-select <?php if (session('errors.kelamin')) : ?>is-invalid<?php endif ?>">
                                    <option disabled selected>Pilih</option>
                                    <option value="Laki-laki" <?= user()->kelamin == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= user()->kelamin == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                                    <option value="Lainnya" <?= user()->kelamin == 'Lainnya' ? 'selected' : ''; ?>>Lainnya</option>
                                </select>
                                <div class="invalid-feedback d-block">
                                    <?= session('errors.kelamin') ?>
                                </div>
                            </div>

                            <!-- Input Alamat -->
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" id="alamat" name="alamat" rows="3"><?= user()->alamat; ?></textarea>
                                <div class="invalid-feedback d-block">
                                    <?= session('errors.alamat') ?>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 text-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        </div>
                    </div>
                </form>
                <!-- /Akun -->

            </div>

            <!-- <div class="card">
                <h5 class="card-header">Ubah Kata Sandi</h5>

                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="<?= route_to('reset-password') ?>">
                        <?= csrf_field() ?>

                        <input type="hidden" value="<?= user_id(); ?>">
                        <div class="row">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Kata Sandi Lama</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control <?php if (session('errors.pass_old')) : ?>is-invalid<?php endif ?>" name="pass_old" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="pass_old" autocomplete="off" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    <div class="invalid-feedback d-block">
                                        <?= session('errors.pass_old') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Kata Sandi</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="off" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    <div class="invalid-feedback d-block">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="pass_confirm">Konfirmasi Kata Sandi</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="pass_confirm" autocomplete="off" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    <div class="invalid-feedback d-block">
                                        <?= session('errors.pass_confirm') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-end">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div> -->
            <!-- <div class="card">
                <h5 class="card-header">Delete Account</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation"
                                id="accountActivation" />
                            <label class="form-check-label" for="accountActivation">I confirm my account
                                deactivation</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                    </form>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?= $this->endSection(); ?>