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

                    <h4 class="mb-2">Selamat datang,</h4>
                    <p class="mb-4">Silahkan masuk dengan akun anda!</p>

                    <!-- Pesan Kesalahan -->
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <!-- Form Login -->
                    <form id="formAuthentication" class="mb-3" action="<?= route_to('login') ?>" method="POST">
                        <?= csrf_field() ?>

                        <!-- Email atau Nama Pengguna -->
                        <div class="mb-3">
                            <label for="login" class="form-label">Email atau Nama Pengguna</label>
                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="login" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" value="<?= old('login');  ?>" autofocus />
                            <div class="invalid-feedback d-block">
                                <?= session('errors.login') ?>
                            </div>
                        </div>

                        <!-- Kata Sandi -->
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Kata Sandi</label>
                                <!-- <a href="auth-forgot-password-basic.html">
                                    <small>Lupa kata sandi?</small>
                                </a> -->
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                <div class="invalid-feedback d-block">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>
                        </div>

                        <!-- Ingat saya -->
                        <!-- <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Ingat Saya </label>
                            </div>
                        </div> -->

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                        </div>
                    </form>

                    <p class="text-center">
                        Ingin bergabung?
                        <a href="<?= route_to('register') ?>">Buat akun</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>