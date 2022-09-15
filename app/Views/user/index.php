<?= $this->extend('templates/index_user'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid p-0">
    <!-- Heading -->
    <section class="py-5" id="heading">
        <div class="container">
            <div class="row">
                <div class="col-md-auto col-8 bg-white p-5 ms-2 rounded">
                    <div class="h1 font-weight-bolder text-primary">MoKos</div>
                    <p class="h4 text-gray-800 lead">Hunian nyaman dengan harga terjangkau</p>
                    <div class="row">
                        <a href="<?= base_url('user/sewa');  ?>" class="btn btn-primary">Sewa Kamar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Kost -->
    <section class="bg-white py-5" id="fasilitas">
        <div class="container py-5">
            <!-- Judul Section -->
            <div class="row mb-5">
                <div class="col text-center">
                    <h3 class="text-primary font-weight-bold">Faslitas dan Layanan</h3>
                </div>
            </div>

            <!-- Fasilitas -->
            <div class="row">
                <div class="col-md-4 col-6 text-center my-5">
                    <i class="fas fa-broom fa-3x"></i>
                    <h5 class="mt-4">Jaminan Kebersihan</h5>
                </div>
                <div class="col-md-4 col-6 text-center my-5">
                    <i class="fas fa-video fa-3x"></i>
                    <h5 class="mt-4">Keamanan CCTV</h5>
                </div>
                <div class="col-md-4 col-6 text-center my-5">
                    <i class="fas fa-parking fa-3x"></i>
                    <h5 class="mt-4">Parkiran Kendaraan</h5>
                </div>
                <div class="col-md-4 col-6 text-center my-5">
                    <i class="fas fa-wifi fa-3x"></i>
                    <h5 class="mt-4">Wi-Fi</h5>
                </div>
                <div class="col-md-4 col-6 text-center my-5">
                    <i class="fas fa-utensils fa-3x"></i>
                    <h5 class="mt-4">Dapur Umum</h5>
                </div>
                <div class="col-md-4 col-6 text-center my-5">
                    <i class="fas fa-tint fa-3x"></i>
                    <h5 class="mt-4">Air PAM</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Tipe Kamar -->
    <section class="py-5" id="tipe">
        <div class="container py-5">
            <!-- Judul Section -->
            <div class="row mb-5">
                <div class="col text-center">
                    <h3 class="text-primary font-weight-bold">Tipe Kamar</h3>
                </div>
            </div>

            <div class="row">
                <?php foreach ($tipe as $tipe) :  ?>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <span class="h5 font-weight-bold text-dark me-2">Tipe <?= $tipe['nama'];  ?></span>
                                <?= badgeStatusTipe($tipe['status']);  ?>
                            </div>
                            <img class="img-fluid" src="<?= base_url('/assets/img/tipe/' . $tipe['gambar']); ?>" alt="<?= $tipe['gambar'];  ?>">
                            <div class="card-body p-4">
                                <div class="row row-cols-2 mb-2">
                                    <div class="col">
                                        <span class="font-weight-bold">Fasilitas :</span>
                                        <p>
                                            <?= $tipe['fasilitas'];  ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <h6 class="mt-2"><span class="h5 font-weight-bold text-dark"><?= formatRupiah($tipe['harga']);  ?></span>
                                            /
                                            bulan</h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="<?= base_url('user/sewa');  ?>" class="btn btn-primary">Sewa Kamar</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach;  ?>
            </div>
        </div>
    </section>

    <!-- Kesan Penghuni -->
    <!-- <section class="bg-white py-5" id="kesan">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col text-center">
                    <h3 class="text-primary font-weight-bold">Kesan Penghuni</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="display-3 text-primary">&#10077;</div>
                            <blockquote class="blockquote">
                                <p class="mb-0">" Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    Totam quaerat modi iusto deserunt praesentium qui officia
                                    exercitationem.
                                    Repellat, culpa ratione. Doloribus cupiditate beatae sint reiciendis
                                    illo
                                    eligendi veritatis dicta odio? "</p>
                                <footer class="blockquote-footer mt-2 text-primary"><cite title="Source Title">Ahmad
                                        Mursyidan</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="display-3 text-primary">&#10077;</div>
                            <blockquote class="blockquote">
                                <p class="mb-0">" Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    Totam quaerat modi iusto deserunt praesentium qui officia
                                    exercitationem.
                                    Repellat, culpa ratione. Doloribus cupiditate beatae sint reiciendis
                                    illo
                                    eligendi veritatis dicta odio? "</p>
                                <footer class="blockquote-footer mt-2 text-primary"><cite title="Source Title">Ahmad
                                        Mursyidan</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="display-3 text-primary">&#10077;</div>
                            <blockquote class="blockquote">
                                <p class="mb-0">" Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    Totam quaerat modi iusto deserunt praesentium qui officia
                                    exercitationem.
                                    Repellat, culpa ratione. Doloribus cupiditate beatae sint reiciendis
                                    illo
                                    eligendi veritatis dicta odio? "</p>
                                <footer class="blockquote-footer mt-2 text-primary"><cite title="Source Title">Ahmad
                                        Mursyidan</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- End Page Content -->
</div>

<?= $this->endSection(); ?>