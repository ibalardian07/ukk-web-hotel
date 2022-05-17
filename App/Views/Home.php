<!-- Start Content -->
<section class="banner d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12">
                <h6 class="text-promotion">
                    <?php if (isset($_SESSION['login'])) { ?>
                        Hai, <span><?= $data['profile']['nama_lengkap']; ?></span>
                        <br>
                        <br>
                        Mau booking hotel secara online?
                        <br>
                        <br>
                        Cukup tentukan tanggal <span>Check-in</span> dan <span>Check-out</span> untuk menikmati fasilitas dari Hotel Hebat.
                    <?php } else { ?>
                        Hai, <span>kamu!</span>
                        <br>
                        <br>
                        Mau booking hotel secara online?
                        <br>
                        <br>
                        Cukup <span>masuk</span> atau <span>daftar</span> untuk menikmati beragam promo dari Hotel Hebat.
                    <?php }; ?>
                </h6>
            </div>
        </div>
    </div>
</section>

<!-- Card Order -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-12 mt-min">
            <div class="card card-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <h6 class="text-small-grey mb-2">
                                Check-in
                            </h6>
                            <input type="date" id="tgl_cekin" class="form-control">
                        </div>
                        <div class="col-lg-4 col-6">
                            <h6 class="text-small-grey mb-2">
                                Check-out
                            </h6>
                            <input type="date" id="tgl_cekout" class="form-control">
                        </div>
                        <div class="col-lg-4 col-12">
                            <h6 class="text-small-grey mb-2">
                                Jumlah Kamar
                            </h6>
                            <input type="number" id="jumlah_kamar" class="form-control" placeholder="Jumlah Kamar">
                        </div>
                    </div>
                    <div class="float-right mt-4">
                        <button type="submit" class="btn btn-primary" id="pesan">Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Card Order -->
<!-- Fasilitas -->
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-12 col-12">
            <h5 class="text-medium-dark">
                Fasilitas
            </h5>
        </div>
        <div class="col-lg-4 col-12 mt-3">
            <div class="card card-shadow">
                <img src="<?= base_url('public/img/fasilitas1.jpg'); ?>" class="w-100" alt="">
                <div class="card-body">
                    <h6 class="text-grey">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam earum beatae voluptatum ad minus consectetur.
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mt-3">
            <div class="card card-shadow">
                <img src="<?= base_url('public/img/fasilitas2.jpg'); ?>" class="w-100" alt="">
                <div class="card-body">
                    <h6 class="text-grey">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam earum beatae voluptatum ad minus consectetur.
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mt-3">
            <div class="card card-shadow">
                <img src="<?= base_url('public/img/fasilitas3.jpg'); ?>" class="w-100" alt="">
                <div class="card-body">
                    <h6 class="text-grey">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam earum beatae voluptatum ad minus consectetur.
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Fasilitas -->
<!-- End Content -->