<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <?= view('Myth\Auth\Views\_message_block') ?>

    <form method="POST" action="<?= base_url('penyewaan/update/' . $penyewaan['id']) ?>">
        <input type="hidden" name="kamar" value="<?= $kamarLama['id'];  ?>">
        <div class="card mb-4">
            <h5 class="card-header">Data Penghuni</h5>
            <hr class="my-0" />
            <div class="card-body">
                <!-- Form penghuni -->
                <div class="row g-2">
                    <!-- Input penghuni -->
                    <div class="col mb-3">
                        <label class="form-label" for="penghuni">penghuni</label>
                        <select id="penghuni" name="penghuni" class="select2 form-select <?php if (session('errors.penghuni')) : ?>is-invalid<?php endif ?>">
                            <option disabled selected>Pilih penghuni...</option>
                            <?php if (getPenghuni($penyewaan['id_penghuni'])) : ?>
                                <option value="<?= $penyewaan['id_penghuni'];  ?>" selected>
                                    <?= getPenghuni($penyewaan['id_penghuni'])['nama'];  ?>
                                </option>
                            <?php endif;  ?>

                            <?php foreach ($penghuni as $penghuni) : ?>
                                <option class="option" value="<?= $penghuni['id'];  ?>">
                                    <?= $penghuni['nama'];  ?>
                                </option>
                            <?php endforeach;  ?>
                        </select>
                        <div class="ms-1 invalid-feedback d-block">
                            <?= session('errors.penghuni') ?>
                        </div>
                    </div>

                    <!-- Input jumlah penghuni -->
                    <div class="col mb-3">
                        <label for="jumlah_penghuni" class="form-label">Jumlah Penghuni</label>
                        <input class="form-control" type="number" value="<?= $penyewaan['jumlah_penghuni'];  ?>" name="jumlah_penghuni" id="jumlah_penghuni" min="1" max="2" />
                        <div id="defaultFormControlHelp" class="form-text">
                            Maksimal 2 Orang
                        </div>
                        <div class="ms-1 invalid-feedback d-block">
                            <?= session('errors.jumlah_penghuni') ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Penyewaan -->
            <hr class="my-0" />
            <h5 class="card-header">Data Penyewaan</h5>
            <hr class="my-0" />

            <div class="card-body">
                <div class="row g-2">
                    <!-- Input tipe kamar -->
                    <div class="col mb-3">
                        <label class="form-label" for="tipe">Tipe Kamar</label>
                        <select id="tipe" name="tipe" class="select2 form-select <?php if (session('errors.tipe')) : ?>is-invalid<?php endif ?>">
                            <option disabled selected>Pilih tipe...</option>
                            <?php foreach ($tipe as $tipe) : ?>
                                <?php
                                $selected = $kamarLama['id_tipe'] == $tipe['id'] ? 'selected' : '';
                                $disabled = $tipe['status'] != 1 ? 'disabled' : '';
                                ?>

                                <option data-harga="<?= $tipe['harga'];  ?>" value="<?= $tipe['id'];  ?>" <?= $selected . ' ' . $disabled ?>>
                                    <?= $tipe['nama'];  ?>
                                    <?= ($tipe['status'] == 0) ? '(Tidak Tersedia)' : '';  ?>
                                    <?= ($tipe['status'] == 2) ? '(Penuh)' : '';  ?>
                                </option>
                            <?php endforeach;  ?>
                        </select>
                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.tipe') ?>
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <!-- Input tanggal masuk -->
                    <div class="col mb-3">
                        <label for="tanggal_masuk" class="col-form-label">Tanggal Masuk</label>
                        <input class="form-control" type="date" value="<?= date('Y-m-d');  ?>" name="tanggal_masuk" id="tanggal_masuk">
                        <div class="ms-1 invalid-feedback d-block">
                            <?= session('errors.tanggal_masuk') ?>
                        </div>
                    </div>

                    <!-- Input tanggal keluar -->
                    <div class="col mb-3">
                        <label for="tanggal_keluar" class="col-form-label">Tanggal Keluar</label>
                        <input class="form-control" type="date" name="tanggal_keluar" value="<?= date('Y-m-d');  ?>" id="tanggal_keluar" readonly>
                        <div class="ms-1 invalid-feedback d-block">
                            <?= session('errors.tanggal_keluar') ?>
                        </div>
                    </div>

                    <!-- Input durasi -->
                    <div class="col-auto mb-3">
                        <label for="durasi" class="col-form-label">Durasi</label>
                        <div class="input-group input-group-merge">
                            <input type="number" class="form-control" id="durasi" name="durasi" value="<?= $penyewaan['durasi'];  ?>" min="1" max="12">
                            <span class="input-group-text">bulan</span>
                        </div>
                        <div class="ms-1 invalid-feedback d-block">
                            <?= session('errors.tanggal_keluar') ?>
                        </div>
                    </div>
                </div>

                <div class="row g-2 visually-hidden">
                    <!-- Input biaya sewa -->
                    <div class="col-auto mb-3">
                        <label for="biaya_sewa" class="form-label">Biaya Sewa</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text <?php if (session('errors.biaya_sewa')) : ?>border-danger<?php endif ?>">RP.</span>
                            <input readonly type="text" class="form-control <?php if (session('errors.harga')) : ?>is-invalid<?php endif ?>" id="biaya_sewa" name="biaya_sewa" placeholder="100000" value="<?= $penyewaan['biaya_sewa'];  ?>" />
                            <span class="input-group-text">.00</span>
                            <div class="ms-1 invalid-feedback d-block">
                                <?= session('errors.biaya_sewa') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <!-- Input metode -->
                    <div class="col mb-3">
                        <label class="form-label" for="metode">Metode Pembayaran</label>
                        <select id="metode" name="metode" class="select2 form-select <?php if (session('errors.penghuni')) : ?>is-invalid<?php endif ?>">
                            <option disabled selected>Pilih metode pembayaran...</option>
                            <?php foreach ($metode as $metode) : ?>
                                <?php $selected = ($pembayaran['id_metode'] == $metode['id']) ? 'selected' : '';  ?>
                                <option class="option" value="<?= $metode['id'];  ?>" <?= $selected;  ?>>
                                    <?= $metode['nama_metode'] . ' ' . $metode['nama_bank'];  ?>
                                </option>
                            <?php endforeach;  ?>
                        </select>
                        <div class="ms-1 invalid-feedback d-block">
                            <?= session('errors.metode') ?>
                        </div>
                    </div>

                    <!-- Input status pembayaran -->
                    <div class="col-auto mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select id="status" name="status" class="select2 form-select <?php if (session('errors.status')) : ?>is-invalid<?php endif ?>">
                            <option disabled selected>Pilih status...</option>
                            <option value="1" <?= $penyewaan['status'] == '1' ? 'selected' : ''; ?>>Sedang Berjalan</option>
                            <option value="2" <?= $penyewaan['status'] == '2' ? 'selected' : ''; ?>>Booking</option>
                            <option value="3" <?= $penyewaan['status'] == '3' ? 'selected' : ''; ?>>Dibatalkan</option>
                            <option value="4" <?= $penyewaan['status'] == '4' ? 'selected' : ''; ?>>Selesai</option>
                        </select>

                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.status') ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 justify-content-end">
                    <div class="col-auto">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <td class="text-end">Biaya Kamar</td>
                                    <td class="ps-5 display-biaya">0</td>
                                </tr>
                                <tr>
                                    <td class="text-end">Durasi</td>
                                    <td class="ps-5 display-durasi">0 Bulan</td>
                                </tr>
                                <tr>
                                    <td class="text-end">Total Sewa</td>
                                    <td class="ps-5 fw-bold fs-5 text-primary display-total">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-2 d-flex justify-content-end">
                    <a href="<?= base_url('penyewaan'); ?>" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>