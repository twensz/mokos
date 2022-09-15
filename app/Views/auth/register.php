<?= $this->extend('auth/template'); ?>

<?= $this->section('content'); ?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">

            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="#" class="app-brand-link align-items-end gap-2">
                            <span class="app-brand-logo demo">
                                <i class='bx bxs-home bx-md'></i>
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder text-capitalize">MoKos</span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <h4 class="mb-2">Buat Akun,</h4>
                    <p class="mb-4">Silahkan isi form dibawah!</p>

                    <!-- Pesan Kesalahan -->
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <!-- Form -->
                    <form id="formAuthentication" class="mb-3" action="<?= route_to('register') ?>" method="POST">
                        <!-- Nama Pengguna -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username" placeholder="Masukan nama pengguna" value="<?= old('username') ?>" autofocus>

                            <div class="invalid-feedback d-block">
                                <?= session('errors.username') ?>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukan email" value="<?= old('email') ?>">

                            <div class="invalid-feedback d-block">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <!-- Kata sandi -->
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Kata Sandi</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="off" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <!-- Konfirmasi Kata sandi -->
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="pass_confirm">Konfirmasi Kata Sandi</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="pass_confirm" autocomplete="off" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>

                        <!-- Persetujuan -->
                        <!-- <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    I agree to
                                    <a href="javascript:void(0);">privacy policy & terms</a>
                                </label>
                            </div>
                        </div> -->

                        <button type="submit" class="btn btn-primary d-grid w-100">Daftar</button>
                    </form>

                    <p class="text-center">
                        Sudah punya akun?
                        <a href="<?= route_to('login') ?>">Masuk</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>