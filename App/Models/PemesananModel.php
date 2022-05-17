<?php

class PemesananModel extends Model
{
    protected $table = 'tb_pemesanan';
    protected $primary = 'id_pemesanan';

    public function getPemesanan()
    {
        if (isset($_SESSION['id_pengguna'])) {
            $id = $_SESSION['id_pengguna'];
            return $this->db->query("SELECT * FROM $this->table JOIN tb_kamar ON tb_pemesanan.id_kamar=tb_kamar.id_kamar WHERE id_pengguna='$id'");
        }
    }

    public function getReservasi()
    {
        return $this->db->query("SELECT * FROM $this->table JOIN tb_kamar ON tb_pemesanan.id_kamar=tb_kamar.id_kamar");
    }

    public function getReservasiKeyword($data = [])
    {
        $keyword = $data['keyword'];

        return $this->db->query("SELECT * FROM $this->table JOIN tb_kamar ON tb_pemesanan.id_kamar=tb_kamar.id_kamar WHERE tb_pemesanan.nama_tamu LIKE '%$keyword%' OR tb_pemesanan.tgl_cekin LIKE '%$keyword%'");
    }

    public function getPemesananId($invoice)
    {
        if (isset($_SESSION['id_pengguna'])) {
            $id = $_SESSION['id_pengguna'];
            return $this->db->query("SELECT * FROM $this->table JOIN tb_kamar ON tb_pemesanan.id_kamar=tb_kamar.id_kamar WHERE id_pengguna='$id' AND $this->primary='$invoice'")->fetch_assoc();
        }
    }

    public function getReservasiId($data = [])
    {
        $id = $data['id'];
        return $this->db->query("SELECT * FROM $this->table JOIN tb_kamar ON tb_pemesanan.id_kamar=tb_kamar.id_kamar WHERE id_pemesanan='$id'")->fetch_assoc();
    }

    public function insert($data = [])
    {
        $id_pengguna = $_SESSION['id_pengguna'];
        $id_pemesanan = mysqli_real_escape_string($this->db, $data['id_pemesanan']);
        $tgl_cekin = mysqli_real_escape_string($this->db, $data['tgl_cekin']);
        $tgl_cekout = mysqli_real_escape_string($this->db, $data['tgl_cekout']);
        $jumlah_kamar = mysqli_real_escape_string($this->db, $data['jumlah_kamar']);
        $nama_pemesan = mysqli_real_escape_string($this->db, $data['nama_pemesan']);
        $email = mysqli_real_escape_string($this->db, $data['email']);
        $nomor_ponsel = mysqli_real_escape_string($this->db, $data['nomor_ponsel']);
        $nama_tamu = mysqli_real_escape_string($this->db, $data['nama_tamu']);
        $tipe_kamar = mysqli_real_escape_string($this->db, $data['tipe_kamar']);
        $status = 'booking';
        $created_at = date('Y-m-d H:i:s');

        return $this->db->query("INSERT INTO $this->table VALUES ('$id_pemesanan', '$id_pengguna', '$tgl_cekin', '$tgl_cekout', '$jumlah_kamar', '$nama_pemesan', '$email', '$nomor_ponsel', '$nama_tamu', '$tipe_kamar', '$status', '$created_at')");
    }

    public function checkin($id)
    {
        return $this->db->query("UPDATE $this->table SET status='check-in' WHERE $this->primary='$id'");
    }

    public function checkout($id)
    {
        return $this->db->query("UPDATE $this->table SET status='check-out' WHERE $this->primary='$id'");
    }
}
