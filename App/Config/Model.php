<?php

class Model
{
    protected $db_host;
    protected $db_user;
    protected $db_pass;
    protected $db_name;
    protected $db;

    public function __construct()
    {
        $this->db_host = 'localhost';
        $this->db_user = 'root';
        $this->db_pass = '';
        $this->db_name = 'ukk_hotel';

        if (isset($this->db_host) && isset($this->db_user) && isset($this->db_pass) && isset($this->db_name)) {
            $this->db = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if ($this->db->connect_error) {
                return 'koneksi database gagal';
            }
        }
    }
}
