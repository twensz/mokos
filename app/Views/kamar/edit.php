<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <h5 class="card-header">Edit Kamar</h5>

        <hr class="my-0" />

        <div class="card-body">
            <!-- Form -->
            <form method="POST" action="<?= base_url('kamar/update/' . $kamar['id']) ?>">
                <?= csrf_field() ?>

                <div class="row g-2">
                    <!-- Input nomor kamar -->
                    <div class="col mb-3">
                        <label for="nomor" class="form-label">Nomor Kamar</label>
                        <input type="text" id="nomor" name="nomor" class="form-control <?php if (session('errors.nomor')) : ?>is-invalid<?php endif ?>" placeholder="Masukan nomor kamar" value="<?= $kamar['nomor']; ?>" />
                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.nomor') ?>
                        </div>
                    </div>
                </div>

                <div class="row g-2">
                    <!-- Input tipe kamar -->
                    <div class="col mb-3">
                        <label class="form-label" for="tipe">Tipe Kamar</label>
                        <select id="tipe" name="tipe" class="select2 form-select <?php if (session('errors.tipe')) : ?>is-invalid<?php endif ?>" value="<?= old('harga');  ?>">
                            <option disabled selected>Pilih tipe...</option>
                            <?php foreach ($tipe as $tipe) : ?>
                                <?php
                                $selected = $kamar['id_tipe'] == $tipe['id'] ? 'selected' : '';
                                $disabled = $tipe['status'] == 0 ? 'disabled' : '';
                                ?>

                                <option value="<?= $tipe['id'];  ?>" <?= $selected . ' ' . $disabled ?>>
                                    <?= $tipe['nama'];  ?>
                                    <?= ($tipe['status'] == 0) ? '(Tidak Tersedia)' : '';  ?>
                                </option>
                            <?php endforeach;  ?>
                        </select>
                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.tipe') ?>
                        </div>
                    </div>

                    <!-- Input status kamar -->
                    <div class="col mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select id="status" name="status" class="select2 form-select <?php if (session('errors.status')) : ?>is-invalid<?php endif ?>">
                            <option disabled selected>Pilih status...</option>
                            <option value="0" <?= $kamar['status'] == '0' ? 'selected' : ''; ?>>Tidak Tersedia</option>
                            <option value="1" <?= $kamar['status'] == '1' ? 'selected' : ''; ?>>Tersedia</option>
                            <!-- <option value="2" <?= $kamar['status'] == '2' ? 'selected' : ''; ?>>Dibooking</option>
                            <option value="3" <?= $kamar['status'] == '3' ? 'selected' : ''; ?>>Dihuni</option> -->
                        </select>
                        <div class="ms-1 invalid-feedback">
                            <?= session('errors.status') ?>
                        </div>
                    </div>
                </div>
                <div class="mt-2 d-flex justify-content-end">
                    <a href="<?= base_url('kamar'); ?>" class="btn btn-outline-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <!-- /Form -->
        </div>

    </div>
</div>
<?= $this->endSection(); ?>