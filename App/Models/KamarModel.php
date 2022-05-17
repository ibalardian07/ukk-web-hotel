<?php

class KamarModel extends Model
{
    protected $table = 'tb_kamar';
    protected $primary = 'id_kamar';

    public function getKamar()
    {
        return $this->db->query("SELECT * FROM $this->table");
    }
}
