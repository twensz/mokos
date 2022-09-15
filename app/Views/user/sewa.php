<?= $this->extend('templates/index_user'); ?>

<?= $this->section('content'); ?>

<div class="container container-p-y">
    <form method="POST" action="<?= base_url('user/prosesSewa/') ?>" enctype="multipart/form-data">
        <div class="card mb-4">
            <h5 class="card-header">Data Penghuni</h5>
            <hr class="my-0" />
            <div class="card-body">
                <!-- Form penghuni -->
                <div class="row g-2">
                    <!-- Input nama penghuni -->
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama Penghuni</label>
                        <input type="text" id="nama" name="nama" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" placeholder="Masukan nama penghuni" value="<?= old('nama'); ?>" />
                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.nama') ?>
                        </div>
                    </div>

                    <!-- Input jumlah penghuni -->
                    <div class="col mb-3">
                        <label for="jumlah_penghuni" class="form-label">Jumlah Penghuni</label>
                        <input class="form-control" type="number" value="1" name="jumlah_penghuni" id="jumlah_penghuni" min="1" max="2" />
                        <div id="defaultFormControlHelp" class="form-text">
                            Maksimal 2 Orang
                        </div>
                        <div class="ms-1 invalid-feedback d-block">
                            <?= session('errors.jumlah_penghuni') ?>
                        </div>
                    </div>
                </div>

                <!-- Input Dokumen -->
                <div class="row">
                    <label class="form-label mb-3">Unggah Dokumen Pengguna (Opsional)</label>

                    <div class="input-group">
                        <label class="input-group-text" for="ktp">KTP</label>
                        <input type="file" class="form-control" id="ktp" name="ktp">
                    </div>
                    <div class="invalid-feedback d-block mb-2">
                        <?= session('errors.ktp'); ?>
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
                                $selected = old('tipe') == $tipe['id'] ? 'selected' : '';
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
                            <input type="number" class="form-control" id="durasi" name="durasi" value="1" min="1" max="12">
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
                            <input readonly type="text" class="form-control <?php if (session('errors.harga')) : ?>is-invalid<?php endif ?>" id="biaya_sewa" name="biaya_sewa" placeholder="100000" value="" />
                            <span class="input-group-text">.00</span>
                            <div class="ms-1 invalid-feedback d-block">
                                <?= session('errors.biaya_sewa') ?>
                            </div>
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
                    <a href="<?= base_url('user'); ?>" class="btn btn-outline-secondary me-2">Batal</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Lanjut
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Metode Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <h6>Transfer Bank</h6>
                            <?php foreach ($metode as $metode) : ?>
                                <div class="input-group mb-2">
                                    <div class="input-group-text">
                                        <input name="metode" class="form-check-input mt-0" type="radio" value="<?= $metode['id'];  ?>" id="<?= $metode['id'];  ?>" required>
                                    </div>
                                    <label class="form-control" for="<?= $metode['id'];  ?>">Transfer Bank <?= $metode['nama_bank'];  ?></label>
                                </div>
                            <?php endforeach;  ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ajukan Sewa</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>



<?= $this->endSection(); ?>