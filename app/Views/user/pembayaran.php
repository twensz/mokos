<?= $this->extend('templates/index_user'); ?>

<?= $this->section('content'); ?>

<div class="container-xxl container-p-y">

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="<?= base_url('user/prosesPembayaran/' . $pembayaran['id']) ?>" enctype="multipart/form-data">
                <div class="card mb-4">
                    <h5 class="card-header text-center">Detail Pembayaran</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="container px-5 py-4">
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <img src="<?= base_url('assets/img/bank/' . $metode['gambar']);  ?>" alt="">
                                    <span class="ms-3">
                                        Transfer Bank <br>
                                        <span class="text-uppercase"><?= $metode['nama_bank'];  ?></span>
                                    </span>
                                </div>
                                <div class="col">
                                    <!-- Info pembayaran -->
                                    <div class="row mb-2">
                                        <div class="col-5">ID Pembayaran</div> :
                                        <div class="col">
                                            <span class="fw-bold text-primary">#<?= $pembayaran['id_pembayaran'];  ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-5">Waktu</div> :
                                        <div class="col">
                                            <span class="fw-bold"><?= formatWaktu($pembayaran['created_at']);  ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5 mb-1">
                                    <div class="col">
                                        Status
                                    </div>
                                    <div class="col">
                                        <div class="col d-flex align-items-center">
                                            <?= badgeStatusPembayaran($pembayaran['status'])  ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col">
                                        Nomor Rekening
                                    </div>
                                    <div class="col">
                                        <div class="col d-flex align-items-center">
                                            <?= $metode['nomor_rekening'];  ?> / <?= $metode['atas_nama'];  ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col">
                                        Waktu Pemesanan
                                    </div>
                                    <div class="col">
                                        <?= formatWaktu($pembayaran['created_at']);  ?>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <div class="col">
                                        Total
                                    </div>
                                    <div class="col">
                                        <?= formatRupiah($pembayaran['total']);  ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Input bukti pembayaran -->
                            <?php if ($pembayaran['status'] == 2 || $pembayaran['status'] == 3) : ?>
                                <div class="row mt-3">
                                    <label class="text-warning mb-2">Dimohon untuk mengupload bukti pembayaran!</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="bukti" name="bukti">
                                    </div>
                                    <div class="invalid-feedback d-block mb-2">
                                        <?= session('errors.bukti'); ?>
                                    </div>
                                </div>
                            <?php endif;  ?>

                            <div class="row justify-content-end mt-5">
                                <div class="col-auto">
                                    <a href="<?= base_url('user/kost');  ?>" class="btn btn-label-secondary">Tutup</a>
                                </div>
                                <?php if ($pembayaran['status'] == 2 || $pembayaran['status'] == 3) : ?>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                <?php endif;  ?>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>



<?= $this->endSection(); ?>