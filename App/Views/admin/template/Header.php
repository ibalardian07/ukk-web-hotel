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

    <!-- Navbar -->
    <nav class="navbar-admin d-flex align-items-center justify-content-between pr-4">
        <div></div>
        <?php if (isset($_SESSION['admin'])) : ?>
            <div>
                <h6 class="text-dark">
                    <?= $_SESSION['nama_petugas']; ?>
                </h6>
            </div>
        <?php endif; ?>
    </nav>
    <!-- End Navbar -->

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <a href="<?= base_url('admin'); ?>" class="side-brand">HOTEL HEBAT</a>
        </div>
        <?php if (isset($_SESSION['admin'])) : ?>
            <div class="line"></div>
            <div class="side-item">
                <a href="<?= base_url('admin'); ?>" class="side-link">
                    Dashboard
                </a>
            </div>
            <div class="line"></div>
            <div class="side-item">
                <a href="<?= base_url('admin/reservasi'); ?>" class="side-link">
                    Reservasi
                </a>
            </div>
            <?php if ($_SESSION['level'] == 'admin') : ?>
                <div class="side-item">
                    <a href="<?= base_url('admin/kamar'); ?>" class="side-link">
                        Kamar
                    </a>
                </div>
                <div class="side-item">
                    <a href="<?= base_url('admin/fasilitas_kamar'); ?>" class="side-link">
                        Fasilitas Kamar
                    </a>
                </div>
                <div class="side-item">
                    <a href="<?= base_url('admin/fasilitas_hotel'); ?>" class="side-link">
                        Fasilitas Hotel
                    </a>
                </div>
            <?php endif; ?>
            <div class="side-item">
                <a href="<?= base_url('admin/logout'); ?>" class="side-link">
                    Keluar
                </a>
            </div>
        <?php endif; ?>
    </div>
    <!-- End Sidebar -->