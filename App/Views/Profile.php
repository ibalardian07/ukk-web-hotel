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

 <div class="container mt-min mb-5">
     <div class="row">
         <div class="col-lg-3 col-12">
             <div class="card card-shadow">
                 <div class="card-body">
                     <h6 class="text-grey text-center">
                         Selamat Datang
                     </h6>
                     <h6 class="text-dark text-center">
                         <?= $data['profile']['nama_lengkap']; ?>
                     </h6>
                     <div class="mt-4">
                         <a href="<?= base_url('account/profile'); ?>" class="text-link font-semi-bold">Profil Saya</a>
                     </div>
                     <div class="mt-3">
                         <a href="<?= base_url('account/history'); ?>" class="text-link font-semi-bold">Histori Pemesanan</a>
                     </div>
                     <div class="mt-3">
                         <a href="<?= base_url('account/security'); ?>" class="text-link font-semi-bold">Kata Sandi dan Keamanan</a>
                     </div>
                     <div class="mt-3">
                         <a href="<?= base_url('account/logout'); ?>" class="text-link font-semi-bold">Keluar</a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-9 col-12">
             <div class="card card-shadow">
                 <div class="card-body">
                     <h5 class="text-medium-dark">
                         Profil Saya
                     </h5>
                     <?php if (isset($_SESSION['result'])) { ?>
                         <div class="alert alert-<?= $_SESSION['result']['alert']; ?> mt-3">
                             <b><?= $_SESSION['result']['title']; ?></b>
                             <br><?= $_SESSION['result']['msg']; ?>
                         </div>
                     <?php }
                        unset($_SESSION['result']); ?>
                     <form action="<?= base_url('account/update_profile'); ?>" method="POST">
                         <div class="mt-4">
                             <h6 class="text-dark">
                                 Nama Lengkap
                             </h6>
                             <input type="text" name="nama_lengkap" class="form-control form-profile" placeholder="Nama Lengkap" value="<?= $data['profile']['nama_lengkap']; ?>">
                         </div>
                         <div class="mt-3">
                             <h6 class="text-dark">
                                 Tanggal Lahir
                             </h6>
                             <input type="date" name="tgl_lahir" class="form-control form-profile" value="<?= $data['profile']['tgl_lahir']; ?>">
                         </div>
                         <div class="mt-3">
                             <h6 class="text-dark">
                                 Jenis Kelamin
                             </h6>
                             <div class="d-flex text-dark">
                                 <div class="d-flex align-items-center mr-3">
                                     <input type="radio" name="jenis_kelamin" value="laki-laki" class="mr-2" <?= ($data['profile']['jenis_kelamin'] == 'laki-laki') ? 'checked' : ''; ?>> Laki-Laki
                                 </div>
                                 <div class="d-flex align-items-center">
                                     <input type="radio" name="jenis_kelamin" value="perempuan" class="mr-2" <?= ($data['profile']['jenis_kelamin'] == 'perempuan') ? 'checked' : ''; ?>> Perempuan
                                 </div>
                             </div>
                         </div>
                         <div class="mt-3">
                             <h6 class="text-dark">
                                 E-mail
                             </h6>
                             <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?= $data['profile']['email']; ?>" disabled>
                         </div>
                         <div class="mt-3">
                             <h6 class="text-dark">
                                 Nomor Telepon
                             </h6>
                             <input type="number" name="nomor_ponsel" class="form-control" placeholder="Nomor Telepon" value="<?= $data['profile']['nomor_ponsel']; ?>" disabled>
                         </div>
                         <div class="float-right mt-4">
                             <button type="submit" name="simpan_profil" class="btn btn-primary">Perbarui</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Content -->