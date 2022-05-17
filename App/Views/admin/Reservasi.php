<div class="container-admin mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="text-medium-dark">
                <?= $data['page']; ?>
            </h5>
        </div>
        <div class="col-lg-12 col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($_SESSION['result'])) { ?>
                        <div class="alert alert-<?= $_SESSION['result']['alert']; ?> mb-3">
                            <b><?= $_SESSION['result']['title']; ?></b>
                            <br><?= $_SESSION['result']['msg']; ?>
                        </div>
                    <?php }
                    unset($_SESSION['result']); ?>
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <input type="date" id="cekin" class="form-control" value="<?= (isset($data['tgl_cekin'])) ? $data['tgl_cekin'] : ''; ?>">
                        </div>
                        <div class="col-lg-4 col-6">
                            <input type="text" id="keyword" class="form-control" placeholder="Cari nama tamu" value="<?= (isset($data['keyword'])) ? $data['keyword'] : ''; ?>">
                        </div>
                        <div class="col-lg-4 col-6">
                            <button id="cari" class="btn btn-block btn-primary">Cari</button>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php foreach ($data['reservasi'] as $reservasi) : ?>
                                    <tr>
                                        <td><a href="<?= base_url('admin/invoice/' . $reservasi['id_pemesanan'] . ''); ?>" class="text-link">#<?= $reservasi['id_pemesanan']; ?></a></td>
                                        <td><?= $reservasi['nama_tamu']; ?></td>
                                        <td><?= indo_date($reservasi['tgl_cekin']); ?></td>
                                        <td><?= indo_date($reservasi['tgl_cekout']); ?></td>
                                        <td><?= ucwords($reservasi['tipe_kamar']); ?></td>
                                        <td><?= $reservasi['jumlah_kamar']; ?></td>
                                        <td><?= ucwords($reservasi['status']); ?></td>
                                        <td>
                                            <?php
                                            if ($reservasi['status'] == 'booking') :
                                            ?>
                                                <a onclick="return confirm('Anda akan melakukan Check-in pesanan ini')" href="<?= base_url('admin/checkin/' . $reservasi['id_pemesanan'] . ''); ?>" class="btn-sm btn-primary">Check-in</a>
                                            <?php
                                            elseif ($reservasi['status'] == 'check-in') :
                                            ?>
                                                <a onclick="return confirm('Anda akan melakukan Check-out pesanan ini')" href="<?= base_url('admin/checkout/' . $reservasi['id_pemesanan'] . ''); ?>" class="btn-sm btn-danger">Check-Out</a>
                                            <?php
                                            else :
                                            ?>
                                                <a class="btn-sm btn-success">Selesai</a>
                                            <?php
                                            endif;
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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