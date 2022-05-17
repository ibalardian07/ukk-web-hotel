<!-- Start Content -->
<section class="login d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12">
                <div class="card card-shadow">
                    <div class="card-body">
                        <h5 class="text-medium-dark">
                            Lupa Kata Sandi
                        </h5>
                        <?php if (isset($_SESSION['result'])) { ?>
                            <div class="alert alert-<?= $_SESSION['result']['alert']; ?> mt-3">
                                <b><?= $_SESSION['result']['title']; ?></b>
                                <br><?= $_SESSION['result']['msg']; ?>
                            </div>
                        <?php }
                        unset($_SESSION['result']); ?>
                        <form action="<?= base_url('account/do_update'); ?>" method="POST">
                            <div class="mt-4">
                                <h6 class="text-dark">
                                    Kata Sandi Baru
                                </h6>
                                <input type="password" name="sandi1" class="form-control" placeholder="Kata Sandi Baru">
                            </div>
                            <div class="mt-3">
                                <h6 class="text-dark">
                                    Konfirmasi Kata Sandi Baru
                                </h6>
                                <input type="password" name="sandi2" class="form-control" placeholder="Konfirmasi Kata Sandi Baru">
                            </div>
                            <div class="mt-4">
                                <button type="submit" name="perbarui" class="btn btn-block btn-warning">Perbarui</button>
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