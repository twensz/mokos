<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url(); ?>/sneat/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $judul; ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/sneat/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url(); ?>/sneat/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/sneat/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>/sneat/assets/vendor/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url(); ?>/sneat/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url(); ?>/sneat/assets/js/config.js"></script>


    <style>
        #heading {
            min-height: 500px;
            background-image: url('<?= base_url('assets/img/tipe/default.jpg');  ?>');
            background-size: cover;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                <?= $this->include('templates/navbar_user'); ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper pt-3 mt-5 sm-mt-0">

                    <!-- Content -->
                    <?= $this->renderSection('content'); ?>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?= $this->include('templates/footer_user'); ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url(); ?>/sneat/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url(); ?>/sneat/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url(); ?>/sneat/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="<?= base_url(); ?>/sneat/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url(); ?>/sneat/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url(); ?>/sneat/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="<?= base_url(); ?>/sneat/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- My Script -->
    <script>
        $('#tanggal_keluar').val(getNext30Days());
        $('#biaya_sewa').val(getBiayaSewa());
        $('.display-durasi').html($('#durasi').val() + ' Bulan');

        $('#tipe').on('change', function() {
            $('#biaya_sewa').val(getBiayaSewa());
            $('.display-biaya').html(formatRupiah(getBiayaKamar()));
            $('.display-total').html(formatRupiah(getBiayaSewa()));
        })
        $('#durasi').on('change', function() {
            $('#biaya_sewa').val(getBiayaSewa());
            $('#tanggal_keluar').val(getNext30Days());
            $('.display-total').html(formatRupiah(getBiayaSewa()));
            $('.display-durasi').html($('#durasi').val() + ' Bulan');
        })
        $('#tanggal_masuk').on('change', function() {
            $('#tanggal_keluar').val(getNext30Days());
        })

        function getNext30Days() {
            let tanggal_masuk = new Date($('#tanggal_masuk').val());
            let durasi = $('#durasi').val();

            return new Date(tanggal_masuk.setDate(tanggal_masuk.getDate() + (30 * durasi))).toISOString().slice(0, 10);
        }

        function getBiayaKamar() {
            return $('#tipe option:selected').data('harga');
        }

        function getBiayaSewa() {
            let harga = $('#tipe option:selected').data('harga');
            let durasi = parseInt($('#durasi').val());

            return harga * durasi;
        }

        function formatRupiah(numb) {
            const format = numb.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            const rupiah = 'RP. ' + convert.join('.').split('').reverse().join('')
            return rupiah;
        }
    </script>

</body>

</html>