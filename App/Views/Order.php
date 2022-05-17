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
                    <h5 class="text-medium-dark mb-4">
                        Formulir Pemesanan
                    </h5>
                    <?php if (isset($_SESSION['result'])) { ?>
                        <div class="alert alert-<?= $_SESSION['result']['alert']; ?> mb-3">
                            <b><?= $_SESSION['result']['title']; ?></b>
                            <br><?= $_SESSION['result']['msg']; ?>
                        </div>
                    <?php }
                    unset($_SESSION['result']); ?>
                    <form action="<?= base_url('order/do_order'); ?>" method="POST">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <h6 class="text-small-grey mb-2">
                                    Check-in
                                </h6>
                                <input type="date" name="tgl_cekin" class="form-control" value="<?= $data['tgl_cekin']; ?>">
                            </div>
                            <div class="col-lg-4 col-6">
                                <h6 class="text-small-grey mb-2">
                                    Check-out
                                </h6>
                                <input type="date" name="tgl_cekout" class="form-control" value="<?= $data['tgl_cekout']; ?>">
                            </div>
                            <div class="col-lg-4 col-12">
                                <h6 class="text-small-grey mb-2">
                                    Jumlah Kamar
                                </h6>
                                <input type="number" name="jumlah_kamar" class="form-control" placeholder="Jumlah Kamar" value="<?= $data['jumlah_kamar']; ?>">
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-lg-6 col-6">
                                <h6 class="text-dark">Nama Pemesan</h6>
                            </div>
                            <div class="col-lg-6 col-6">
                                <input type="text" name="nama_pemesan" class="form-control mt-2" placeholder="Nama Pemesan" value="<?= (isset($_SESSION['login'])) ? $data['profile']['nama_lengkap'] : ''; ?>">
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-lg-6 col-6">
                                <h6 class="text-dark">E-mail</h6>
                            </div>
                            <div class="col-lg-6 col-6">
                                <input type="email" name="email" class="form-control mt-2" placeholder="E-Mail" value="<?= (isset($_SESSION['login'])) ? $data['profile']['email'] : ''; ?>">
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-lg-6 col-6">
                                <h6 class="text-dark">Nomor Telepon</h6>
                            </div>
                            <div class="col-lg-6 col-6">
                                <input type="number" name="nomor_ponsel" class="form-control mt-2" placeholder="Nomor Telepon" value="<?= (isset($_SESSION['login'])) ? $data['profile']['nomor_ponsel'] : ''; ?>">
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-lg-6 col-6">
                                <h6 class="text-dark">Nama Tamu</h6>
                            </div>
                            <div class="col-lg-6 col-6">
                                <input type="text" name="nama_tamu" class="form-control mt-2" placeholder="Nama Tamu">
                            </div>
                        </div>
                        <div class="row mt-3 d-flex align-items-center">
                            <div class="col-lg-6 col-6">
                                <h6 class="text-dark">Tipe Kamar</h6>
                            </div>
                            <div class="col-lg-6 col-6">
                                <select name="tipe_kamar" class="form-control">
                                    <option value="NULL" disabled selected>Tipe Kamar</option>
                                    <?php foreach ($data['tipe_kamar'] as $tipe_kamar) : ?>
                                        <option value="<?= $tipe_kamar['id_kamar']; ?>"><?= ucwords($tipe_kamar['tipe_kamar']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="float-right mt-4">
                            <button type="submit" class="btn btn-primary" name="konfirmasi">Konfirmasi Pemesanan</button>
                        </div>
                    </form>
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
                <img src="<?= base_url('public/img/fasilitas1.jpg') ?>" class="w-100" alt="">
                <div class="card-body">
                    <h6 class="text-grey">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam earum beatae voluptatum ad minus consectetur.
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mt-3">
            <div class="card card-shadow">
                <img src="<?= base_url('public/img/fasilitas2.jpg') ?>" class="w-100" alt="">
                <div class="card-body">
                    <h6 class="text-grey">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam earum beatae voluptatum ad minus consectetur.
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mt-3">
            <div class="card card-shadow">
                <img src="<?= base_url('public/img/fasilitas3.jpg') ?>" class="w-100" alt="">
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