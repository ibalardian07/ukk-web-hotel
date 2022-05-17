<!-- Start Content -->
<div class="container">
    <div class="row">
        <?php foreach ($data['kamar'] as $kamar) : ?>
            <div class="col-lg-12 col-12 mb-5">
                <img src="<?= base_url('public/img/' . $kamar['foto_kamar'] . ''); ?>" class="w-100" alt="">
                <h5 class="text-medium-dark mt-3">
                    <?= $kamar['tipe_kamar']; ?>
                </h5>
                <h6 class="text-grey">
                    Fasilitas:<br>
                </h6>
                <h6 class="text-grey">
                    <?php foreach ($data['fasilitas']->getFasilitas($kamar['id_kamar']) as $fasilitas) : ?>
                        <?= $fasilitas['nama_fasilitas']; ?><br>
                    <?php endforeach; ?>
                </h6>
            </div>
        <?php endforeach; ?>
        <!-- <div class="col-lg-12 col-12 mb-5">
            <img src="<?= base_url('public/img/deluxe.jpg'); ?>" class="w-100" alt="">
            <h5 class="text-medium-dark mt-3">
                Superior
            </h5>
            <h6 class="text-grey">
                Fasilitas:<br>
                Kamar berukuran luas 32 m2<br>
                Kamar mandi shower<br>
                Coffe Maker<br>
                AC<br>
                LED TV 32 inch
            </h6>
        </div> -->
    </div>
</div>
<!-- End Content -->