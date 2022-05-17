<?php

class PenggunaModel extends Model
{
    protected $table = 'tb_pengguna';
    protected $primary = 'id_pengguna';

    public function login($data = [])
    {
        $email = mysqli_real_escape_string($this->db, $data['email']);

        return $this->db->query("SELECT * FROM $this->table WHERE email='$email'")->fetch_assoc();
    }

    public function cekNomor($data = [])
    {
        $nomor_ponsel = mysqli_real_escape_string($this->db, $data['nomor_ponsel']);

        return $this->db->query("SELECT * FROM $this->table WHERE nomor_ponsel='$nomor_ponsel'")->fetch_assoc();
    }

    public function cekEmailPin($data = [])
    {
        $email = mysqli_real_escape_string($this->db, $data['email']);
        $pin = mysqli_real_escape_string($this->db, $data['pin']);

        return $this->db->query("SELECT * FROM $this->table WHERE email='$email' AND pin='$pin'")->fetch_assoc();
    }

    public function getInfo()
    {
        if (isset($_SESSION['id_pengguna'])) {
            $id = $_SESSION['id_pengguna'];
            return $this->db->query("SELECT * FROM $this->table WHERE $this->primary='$id'")->fetch_assoc();
        }
    }

    public function updatePassword($data = [])
    {
        $email = mysqli_real_escape_string($this->db, $data['email']);
        $kata_sandi = mysqli_real_escape_string($this->db, $data['kata_sandi']);

        return $this->db->query("UPDATE $this->table SET kata_sandi='$kata_sandi' WHERE email='$email'");
    }

    public function save($data = [])
    {
        $nama_lengkap = mysqli_real_escape_string($this->db, $data['nama_lengkap']);
        $jenis_kelamin = mysqli_real_escape_string($this->db, $data['jenis_kelamin']);
        $tgl_lahir = mysqli_real_escape_string($this->db, $data['tgl_lahir']);

        if (isset($_SESSION['id_pengguna'])) {
            $id = $_SESSION['id_pengguna'];
            return $this->db->query("UPDATE $this->table SET nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', tgl_lahir='$tgl_lahir' WHERE $this->primary='$id'");
        }
    }

    public function insert($data = [])
    {
        $nama_lengkap = mysqli_real_escape_string($this->db, $data['nama_lengkap']);
        $email = mysqli_real_escape_string($this->db, $data['email']);
        $nomor_ponsel = mysqli_real_escape_string($this->db, $data['nomor_ponsel']);
        $kata_sandi = mysqli_real_escape_string($this->db, $data['kata_sandi']);
        $pin = mysqli_real_escape_string($this->db, $data['pin']);

        return $this->db->query("INSERT INTO tb_pengguna VALUES (NULL, '$nama_lengkap', '1999-01-01', 'laki-laki', '$email', '$nomor_ponsel', '$kata_sandi', '$pin')");
    }
}
