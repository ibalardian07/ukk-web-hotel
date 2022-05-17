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

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('home'); ?>">hotel <span>hebat</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home/kamar'); ?>">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home/fasilitas'); ?>">Fasilitas</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['login'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('account/profile'); ?>"><?= $data['profile']['nama_lengkap']; ?></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('account/login'); ?>">Masuk/Daftar</a>
                        </li>
                    <?php }; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->