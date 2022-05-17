<!-- Start Content -->
<section class="login d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12">
                <div class="card card-shadow">
                    <div class="card-body">
                        <h5 class="text-medium-dark">
                            Masuk
                        </h5>
                        <?php if (isset($_SESSION['result'])) { ?>
                            <div class="alert alert-<?= $_SESSION['result']['alert']; ?> mt-3">
                                <b><?= $_SESSION['result']['title']; ?></b>
                                <br><?= $_SESSION['result']['msg']; ?>
                            </div>
                        <?php }
                        unset($_SESSION['result']); ?>
                        <form action="<?= base_url('account/do_login'); ?>" method="POST">
                            <div class="mt-4">
                                <h6 class="text-dark">
                                    E-mail
                                </h6>
                                <input type="email" name="email" class="form-control" placeholder="E-Mail">
                            </div>
                            <div class="mt-3">
                                <h6 class="text-dark">
                                    Kata Sandi
                                </h6>
                                <input type="password" id="kata_sandi" name="kata_sandi" class="form-control" placeholder="Kata Sandi">
                            </div>
                            <div class="mt-3">
                                <h6 class="text-dark">
                                    <input type="checkbox" id="lihat" class="mr-1"> Lihat Kata Sandi
                                </h6>
                            </div>
                            <div class="mt-4">
                                <button type="submit" name="masuk" class="btn btn-block btn-warning">Masuk</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="<?= base_url('account/register'); ?>" class="text-link">Buat Akun</a>
                            <a href="<?= base_url('account/forgot'); ?>" class="text-link">Lupa Kata Sandi Anda?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->