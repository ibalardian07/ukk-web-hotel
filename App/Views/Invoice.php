<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css'); ?>?ver=<?= rand(); ?>">
    <link rel="stylesheet" href="<?= base_url('public/fonts/font.css'); ?>?ver=<?= rand(); ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css'); ?>?ver=<?= rand(); ?>">
    <title><?= $data['title']; ?> - <?= $data['page']; ?></title>
</head>

<body class="bg-grey">
    <!-- Start Content -->
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="card card-shadow">
                    <div class="card-body">
                        <h5 class="text-medium-dark">
                            Pesanan #<?= $data['id_pemesanan']; ?>
                        </h5>
                        <div class="row mt-5">
                            <div class="col-lg-12 col-12">
                                <h6 class="text-dark">
                                    Informasi Pemesan :
                                </h6>
                                <h6 class="text-grey">
                                    <?= $data['invoice']['nama_pemesan']; ?><br>
                                    <?= $data['invoice']['nomor_ponsel']; ?><br>
                                    <?= $data['invoice']['email']; ?>
                                </h6>
                            </div>
                            <div class="col-lg-12 col-12 mt-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-grey">
                                            <tr>
                                                <td>
                                                    <?= ucwords($data['invoice']['tipe_kamar']); ?> (<?= $data['invoice']['nama_tamu']; ?>) - Kamar Hotel Tipe <?= ucwords($data['invoice']['tipe_kamar']); ?> dengan Jumlah <?= $data['invoice']['jumlah_kamar']; ?> Kamar (<?= indo_date($data['invoice']['tgl_cekin']) . ' - ' . indo_date($data['invoice']['tgl_cekout']); ?>)
                                                </td>
                                                <td>
                                                    <?= ucwords($data['invoice']['status']); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <script src="<?= base_url('public/js/jquery-3.6.0.min.js'); ?>?ver=<?= rand(); ?>"></script>
    <script src="<?= base_url('public/js/bootstrap.bundle.js'); ?>?ver=<?= rand(); ?>"></script>
    <script src="<?= base_url('public/js/app.js'); ?>?ver=<?= rand(); ?>"></script>
</body>

</html>