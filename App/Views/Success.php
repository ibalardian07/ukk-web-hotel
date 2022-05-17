<!-- Start Content -->
<section class="login d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-12">
                <h5 class="text-medium-dark text-center">
                    <?= $_SESSION['result']['title']; ?>
                </h5>
                <h6 class="text-grey text-center">
                    <?= $_SESSION['result']['msg']; ?>
                </h6>
                <div class="mt-3">
                    <button type="submit" onclick="return location.href='<?= base_url('account/invoice/' . $data['invoice'] . ''); ?>'" class="btn btn-block btn-warning">Detail Pesanan</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
<?php
unset($_SESSION['result']);
unset($_SESSION['success']);
?>