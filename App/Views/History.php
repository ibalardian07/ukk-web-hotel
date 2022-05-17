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
                         Histori Pemesanan
                     </h5>
                     <?php if (isset($_SESSION['result'])) { ?>
                         <div class="alert alert-<?= $_SESSION['result']['alert']; ?> mt-3">
                             <b><?= $_SESSION['result']['title']; ?></b>
                             <br><?= $_SESSION['result']['msg']; ?>
                         </div>
                     <?php }
                        unset($_SESSION['result']); ?>
                     <div class="table-responsive mt-4">
                         <table class="table table-bordered table-striped">
                             <thead class="text-dark">
                                 <tr>
                                     <th>ID</th>
                                     <th>Nama Tamu</th>
                                     <th>Check-in</th>
                                     <th>Check-out</th>
                                     <th>Tipe Kamar</th>
                                     <th>Jumlah Kamar</th>
                                     <th>Status</th>
                                 </tr>
                             </thead>
                             <tbody class="text-dark">
                                 <?php foreach ($data['history'] as $histori) { ?>
                                     <tr>
                                         <td><a href="<?= base_url('account/invoice/' . $histori['id_pemesanan'] . ''); ?>" class="text-link">#<?= $histori['id_pemesanan']; ?></a></td>
                                         <td><?= $histori['nama_tamu']; ?></td>
                                         <td><?= indo_date($histori['tgl_cekin']); ?></td>
                                         <td><?= indo_date($histori['tgl_cekout']); ?></td>
                                         <td><?= ucwords($histori['tipe_kamar']); ?></td>
                                         <td><?= $histori['jumlah_kamar']; ?></td>
                                         <td><?= ucwords($histori['status']); ?></td>
                                     </tr>
                                 <?php }; ?>
                             </tbody>
                         </table>
                     </div>
                     <h6 class="text-small-grey mt-1">
                         Catatan: Klik #ID Pemesanan Untuk Melihat Detail.
                     </h6>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Content -->