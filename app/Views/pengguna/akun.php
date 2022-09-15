<?=$this->extend('templates/index');?>

<?=$this->section('content');?>

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Akun</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i>
                        Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages-account-settings-connections.html"><i
                            class="bx bx-link-alt me-1"></i> Connections</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Detail Profil</h5>

                <div class="card-body">
                    <?=view('Myth\Auth\Views\_message_block')?>
                </div>

                <!-- Akun -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <!-- Foto Profil -->
                        <img src="<?=base_url();?>/sneat/assets/img/avatars/1.png" alt="user-avatar"
                            class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Unggah Foto</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>

                            <p class="text-muted mb-0">Format (JPG, GIF or PNG). Ukuran maksimal 800K</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="<?=route_to('update')?>">
                        <input type="hidden" value="<?=user_id();?>">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="fullname" name="fullname"
                                    value="<?=user()->fullname;?>" placeholder="Masukan nama lengkap" autofocus />
                                <div class="invalid-feedback">
                                    <?=session('errors.fullname')?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email"
                                    class="form-control <?php if (session('errors.email')): ?>is-invalid<?php endif?>"
                                    id="email" name="email" aria-describedby="emailHelp" placeholder="Masukan Email"
                                    value="<?=user()->email;?>">
                                <div class="invalid-feedback">
                                    <?=session('errors.email')?>
                                </div>
                            </div>
                            <!-- <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Nomor Telepon</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">(+62)</span>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder="812 3456 7891" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="country">Jenis Kelamin</label>
                                <select id="country" name="kelamin" class="select2 form-select">
                                    <option value="">Pilih</option>
                                    <option value="Lakilaki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div> -->
                            <!-- <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">State</label>
                                <input class="form-control" type="text" id="state" name="state"
                                    placeholder="California" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="zipCode" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="231465"
                                    maxlength="6" />
                            </div> -->
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div>
                    </form>
                </div>
                <!-- /Akun -->
            </div>

            <div class="card">
                <h5 class="card-header">Ubah Kata Sandi</h5>

                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="<?=route_to('reset-password')?>">
                        <?=csrf_field()?>

                        <input type="hidden" value="<?=user_id();?>">
                        <div class="row">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Kata Sandi Lama</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control <?php if (session('errors.pass_old')): ?>is-invalid<?php endif?>"
                                        name="pass_old"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="pass_old" autocomplete="off" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    <div class="invalid-feedback">
                                        <?=session('errors.pass_old')?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Kata Sandi</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control <?php if (session('errors.password')): ?>is-invalid<?php endif?>"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" autocomplete="off" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    <div class="invalid-feedback">
                                        <?=session('errors.password')?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="pass_confirm">Konfirmasi Kata Sandi</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="pass_confirm"
                                        class="form-control <?php if (session('errors.pass_confirm')): ?>is-invalid<?php endif?>"
                                        name="pass_confirm"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="pass_confirm" autocomplete="off" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    <div class="invalid-feedback">
                                        <?=session('errors.pass_confirm')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
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

<?=$this->endSection();?>