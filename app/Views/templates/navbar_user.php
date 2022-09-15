<nav class="navbar navbar-expand-xl bg-navbar-theme fixed-top">
    <div class="container justify-content-between">
        <a class="navbar-brand d-flex align-items-start" href="<?= base_url('user');  ?>">
            <i class='text-primary bx bxs-home bx-sm'></i>
            <div class="fw-bolder ms-1 fs-5 p-0 text-body">
                MoKos
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-1">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-ex-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link ms-2" href="<?= base_url('user');  ?>#fasilitas">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ms-2" href="<?= base_url('user');  ?>#tipe">Tipe</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link ms-2" href="<?= base_url('user');  ?>#kesan">Kesan Penghuni</a>
                </li> -->
                <li class="nav-item">
                    <a href="<?= base_url('user/sewa');  ?>" class="btn btn-primary ms-3">Sewa Kamar</a>
                </li>
            </ul>

            <ul class="navbar-nav flex-row align-items-center ms-md-4">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar">
                            <img src="<?= base_url(); ?>/assets/img/avatars/<?= user()->gambar;  ?>" alt class="rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('/user/profile')  ?>">
                                <div class="d-flex">
                                    <div class="me-3 d-flex align-items-center">
                                        <div class="avatar">
                                            <img src="<?= base_url(); ?>/assets/img/avatars/<?= user()->gambar;  ?>" alt class="rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="fw-semibold mb-n1"><?= user()->username;  ?></div>
                                        <small class="text-muted"><?= getRole(user()->getRoles());  ?></small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('/user/kost')  ?>">
                                <i class="bx bxs-home me-2"></i>
                                <span class="align-middle">Kos Saya</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('/user/profile')  ?>">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('/logout')  ?>">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </div>
</nav>