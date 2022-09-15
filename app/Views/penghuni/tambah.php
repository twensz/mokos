<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-4">

        <h5 class="card-header">Tambah Penghuni</h5>
        <hr class="my-0" />
        <div class="card-body">
            <!-- Form tambah penghuni -->
            <form method="POST" action="<?= base_url('penghuni/simpan/') ?>" enctype="multipart/form-data">
                <div class="row g-2">
                    <!-- Input nama -->
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama Penghuni</label>
                        <input type="text" id="nama" name="nama" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" placeholder="Masukan nama penghuni" value="<?= old('nama'); ?>" />
                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.nama') ?>
                        </div>
                    </div>

                    <!-- Input status -->
                    <div class="col mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select id="status" name="status" class="select2 form-select <?php if (session('errors.status')) : ?>is-invalid<?php endif ?>">
                            <option disabled selected>Pilih status...</option>
                            <option value="1" <?= old('status') == '1' ? 'selected' : ''; ?>>Tersedia</option>
                            <option value="2" <?= old('status') == '2' ? 'selected' : ''; ?>>Booking</option>
                            <option value="3" <?= old('status') == '3' ? 'selected' : ''; ?>>Menghuni</option>
                            <option value="4" <?= old('status') == '4' ? 'selected' : ''; ?>>Keluar</option>
                        </select>
                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.status') ?>
                        </div>
                    </div>
                </div>

                <!-- Input Dokumen -->
                <div class="row">
                    <label class="form-label mb-3">Unggah Dokumen Pengguna</label>

                    <!-- Input KTP -->
                    <div class="input-group">
                        <label class="input-group-text" for="ktp">KTP</label>
                        <input type="file" class="form-control" id="ktp" name="ktp">

                        <div class="invalid-feedback d-block mb-2">
                            <?= session('errors.ktp'); ?>
                        </div>
                    </div>

                    <!-- Input KK -->
                    <div class="input-group">
                        <label class="input-group-text" for="kk">KK</label>
                        <input type="file" class="form-control" id="kk" name="kk">

                        <div class="invalid-feedback d-block mb-2">
                            <?= session('errors.kk'); ?>
                        </div>
                    </div>

                    <!-- Input BN -->
                    <div class="input-group">
                        <label class="input-group-text" for="bn">Buku Nikah</label>
                        <input type="file" class="form-control" id="bn" name="bn">

                        <div class="invalid-feedback d-block mb-2">
                            <?= session('errors.bn'); ?>
                        </div>
                    </div>

                </div>

                <!-- Tombol Aksi -->
                <div class="mt-2 d-flex justify-content-end">
                    <a href="<?= base_url('penghuni'); ?>" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
            <!-- /Form tambah penghuni -->

        </div>

    </div>

</div>
<?= $this->endSection(); ?>