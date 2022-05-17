<!-- Start Content -->
<section class="login d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12">
                <div class="card card-shadow">
                    <div class="card-body">
                        <h5 class="text-medium-dark">
                            Daftar
                        </h5>
                        <?php if (isset($_SESSION['result'])) { ?>
                            <div class="alert alert-<?= $_SESSION['result']['alert']; ?> mt-3">
                                <b><?= $_SESSION['result']['title']; ?></b>
                                <br><?= $_SESSION['result']['msg']; ?>
                            </div>
                        <?php }
                        unset($_SESSION['result']); ?>
                        <form action="<?= base_url('account/do_register'); ?>" method="POST">
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-lg-6 col-6">
                                        <h6 class="text-dark">
                                            Nama Lengkap
                                        </h6>
                                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="col-lg-6 col-6">
                                        <h6 class="text-dark">
                                            E-mail
                                        </h6>
                                        <input type="email" name="email" class="form-control" placeholder="E-Mail">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="text-dark">
                                    Nomor Telepon
                                </h6>
                                <input type="number" name="nomor_ponsel" class="form-control" placeholder="0838xxxxxxxx">
                            </div>
                            <div class="mt-3">
                                <h6 class="text-dark">
                                    Kata Sandi
                                </h6>
                                <input type="password" name="kata_sandi" class="form-control" placeholder="Kata Sandi">
                            </div>
                            <div class="mt-3">
                                <h6 class="text-dark">
                                    PIN Keamanan
                                </h6>
                                <input type="password" name="pin" class="form-control" maxlength="6" placeholder="PIN Keamanan 6 digit">
                            </div>
                            <div class="mt-4">
                                <button type="submit" name="daftar" class="btn btn-block btn-warning">Daftar</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="<?= base_url('account/login'); ?>" class="text-link">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->