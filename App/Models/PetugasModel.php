<?php

class PetugasModel extends Model
{
    protected $table = 'tb_petugas';
    protected $primary = 'id_petugas';

    public function login($data = [])
    {
        $username = mysqli_real_escape_string($this->db, $data['username']);

        return $this->db->query("SELECT * FROM $this->table WHERE username='$username'")->fetch_assoc();
    }
}
