<div class="container-admin mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="text-medium-dark">
                <?= $data['page']; ?>
            </h5>
        </div>
        <div class="col-lg-12 col-12">
            <?php if (isset($_SESSION['result'])) { ?>
                <div class="alert alert-<?= $_SESSION['result']['alert']; ?> mt-3">
                    <b><?= $_SESSION['result']['title']; ?></b>
                    <br><?= $_SESSION['result']['msg']; ?>
                </div>
            <?php }
            unset($_SESSION['result']); ?>
        </div>
    </div>
</div>