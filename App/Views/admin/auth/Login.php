<!-- Start Content -->
<section class="login d-flex align-items-center">
    <div class="container-admin">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12">
                <div class="card card-shadow">
                    <div class="card-body">
                        <?php if (isset($_SESSION['result'])) { ?>
                            <div class="alert alert-<?= $_SESSION['result']['alert']; ?> mt-3">
                                <b><?= $_SESSION['result']['title']; ?></b>
                                <br><?= $_SESSION['result']['msg']; ?>
                            </div>
                        <?php }
                        unset($_SESSION['result']); ?>
                        <form action="<?= base_url('admin/do_login'); ?>" method="POST">
                            <div>
                                <h6 class="text-dark">
                                    Username
                                </h6>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="mt-3">
                                <h6 class="text-dark">
                                    Password
                                </h6>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="mt-4">
                                <button type="submit" name="masuk" class="btn btn-block btn-warning">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->