<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <?= view('Myth\Auth\Views\_message_block') ?>

    <form action="<?= base_url('pembayaran/tambah') ?>" method="POST" enctype="multipart/form-data">
        <div class="card mb-4">
            <h5 class="card-header"><?= $judul;  ?></h5>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                    <!-- Input bukti pembayaran -->
                    <div class="col-auto mb-3">
                        <label for="bukti" class="form-label">Upload bukti pembayaran</label>
                        <input type="file" class="form-control" id="bukti" name="bukti">
                        <div id="defaultFormControlHelp" class="form-text">
                            Kosongkan jika tidak ingin diubah
                        </div>
                        <div class="invalid-feedback d-block mb-2">
                            <?= session('errors.bukti'); ?>
                        </div>
                    </div>

                    <!-- Input total pembayaran -->
                    <div class="col-auto mb-3">
                        <label for="total" class="form-label">Total</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text <?php if (session('errors.total')) : ?>border-danger<?php endif ?>">RP.</span>
                            <input type="number" class="form-control <?php if (session('errors.total')) : ?>is-invalid<?php endif ?>" id="total" name="total" placeholder="100000" value="<?= old('total');  ?>" />
                            <span class="input-group-text">.00</span>
                        </div>

                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.total') ?>
                        </div>
                    </div>

                    <!-- Input status pembayaran -->
                    <div class="col-auto mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select id="status" name="status" class="select2 form-select <?php if (session('errors.status')) : ?>is-invalid<?php endif ?>">
                            <option disabled selected>Pilih status...</option>
                            <option value="1" <?= old('status') == '1' ? 'selected' : ''; ?>>Berhasil</option>
                            <option value="2" <?= old('status') == '2' ? 'selected' : ''; ?>>Pending</option>
                            <option value="3" <?= old('status') == '3' ? 'selected' : ''; ?>>Dibatalkan</option>
                            <option value="3" <?= old('status') == '4' ? 'selected' : ''; ?>>Menunggu Konfirmasi</option>
                        </select>

                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.status') ?>
                        </div>
                    </div>
                </div>

                <!-- Tombol aksi -->
                <div class="mt-2 d-flex justify-content-end">
                    <a href="<?= base_url('pembayaran'); ?>" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>