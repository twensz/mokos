<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?= base_url('admin/index'); ?>" class="app-brand-link align-items-end">
            <!-- Logo -->
            <span class="app-brand-logo demo">
                <i class='bx bxs-home bx-md'></i>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder text-capitalize ms-2">MoKos</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="<?= base_url('admin/index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Dashboard -->
        <li class="menu-item">
            <a href="<?= base_url('user'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Halaman User</div>
            </a>
        </li>

        <!-- Kos -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kos</span>
        </li>
        <li class="menu-item <?php if (current_url(true)->getSegment(1) == 'kamar' || current_url(true)->getSegment(1) == 'tipe') : ?>active open<?php endif ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-door-open'></i>
                <div data-i18n="Layouts">Kamar</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item <?php if (current_url(true)->getSegment(1) == 'kamar') : ?>active<?php endif ?>">
                    <a href="<?= base_url(); ?>/kamar" class="menu-link">
                        <div data-i18n="Without menu">List Kamar</div>
                    </a>
                </li>
                <li class="menu-item <?php if (current_url(true)->getSegment(1) == 'tipe') : ?>active<?php endif ?>">
                    <a href="<?= base_url(); ?>/tipe/index" class="menu-link">
                        <div data-i18n="Without navbar">Tipe Kamar</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item <?php if (current_url(true)->getSegment(1) == 'penghuni') : ?>active<?php endif ?>">
            <a href="<?= base_url(); ?>/penghuni" class="menu-link">
                <i class='menu-icon tf-icons bx bx-group'></i>
                <div data-i18n="Account Settings">Penghuni</div>
            </a>
        </li>

        <li class="menu-item <?php if (current_url(true)->getSegment(1) == 'penyewaan') : ?>active<?php endif ?>">
            <a href="<?= base_url(); ?>/penyewaan" class="menu-link ">
                <i class='menu-icon tf-icons bx bx-wallet-alt'></i>
                <div data-i18n="Account Settings">Penyewaan</div>
            </a>
        </li>

        <li class="menu-item <?php if (current_url(true)->getSegment(1) == 'pembayaran' || current_url(true)->getSegment(1) == 'metode') : ?>active open<?php endif ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-money'></i>
                <div data-i18n="Layouts">Pembayaran</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item <?php if (current_url(true)->getSegment(1) == 'pembayaran') : ?>active<?php endif ?>">
                    <a href="<?= base_url(); ?>/pembayaran" class="menu-link">
                        <div data-i18n="Without menu">List Pembayaran</div>
                    </a>
                </li>
                <li class="menu-item <?php if (current_url(true)->getSegment(1) == 'metode') : ?>active<?php endif ?>">
                    <a href="<?= base_url(); ?>/metode" class="menu-link">
                        <div data-i18n="Without navbar">Metode Pembayaran</div>
                    </a>
                </li>
            </ul>
        </li>


        <!-- Akun -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Akun</span>
        </li>
        <li class="menu-item">
            <a href="<?= base_url(); ?>/admin/profile" class="menu-link">
                <i class='menu-icon tf-icons bx bx-user'></i>
                <div data-i18n="Account Settings">Profile Saya</div>
            </a>
        </li>
    </ul>
</aside>