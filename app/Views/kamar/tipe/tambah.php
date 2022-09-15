<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-4">

        <h5 class="card-header">Tambah Tipe Kamar</h5>


        <hr class="my-0" />

        <div class="card-body">
            <!-- Form -->
            <form method="POST" action="<?= base_url('tipe/simpan/') ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row g-2">
                    <!-- Input nama tipe -->
                    <div class="col mb-3">
                        <label for="nama" class="form-label">Nama Tipe</label>
                        <input type="text" id="nama" name="nama" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" placeholder="Masukan nama tipe" value="<?= old('nama'); ?>" />
                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.nama') ?>
                        </div>
                    </div>

                    <!-- Input status tipe -->
                    <div class="col mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select id="status" name="status" class="select2 form-select <?php if (session('errors.status')) : ?>is-invalid<?php endif ?>">
                            <option disabled selected>Pilih status...</option>
                            <option value="0" <?= old('status') == '0' ? 'selected' : ''; ?>>Tidak Aktif</option>
                            <option value="1" <?= old('status') == '1' ? 'selected' : ''; ?>>Aktif</option>
                        </select>
                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.status') ?>
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <!-- Input harga kamar -->
                    <div class="col mb-3">
                        <label for="harga" class="form-label">Harga Kamar</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text <?php if (session('errors.harga')) : ?>border-danger<?php endif ?>">RP.</span>
                            <input type="text" class="form-control <?php if (session('errors.harga')) : ?>is-invalid<?php endif ?>" id="harga" name="harga" placeholder="100000" value="" />
                            <span class="input-group-text">.00</span>
                            <div class="ms-1 invalid-feedback">
                                <?= session('errors.harga') ?>
                            </div>
                        </div>
                    </div>

                    <!-- Input fasilitas kamar -->
                    <div class="mb-3 col">
                        <label for="fasilitas" class="form-label">Fasilitas Kamar</label>
                        <textarea class="form-control <?php if (session('errors.fasilitas')) : ?>is-invalid<?php endif ?>" id="fasilitas" name="fasilitas" rows="3"><?= old('fasilitas'); ?></textarea>
                        <div class="invalid-feedback d-block">
                            <?= session('errors.fasilitas') ?>
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="gambar" name="gambar">

                            <div class="invalid-feedback d-block mb-2">
                                <?= session('errors.gambar'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-2 d-flex justify-content-end">
                    <a href="<?= base_url('tipe'); ?>" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <!-- /Form -->
        </div>

    </div>

</div>
<?= $this->endSection(); ?>