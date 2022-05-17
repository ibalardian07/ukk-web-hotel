<?php

class FasilitaskamarModel extends Model
{
    protected $table = 'tb_fasilitas';
    protected $primary = 'id_fasilitas';

    public function getFasilitas($id_kamar)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE id_kamar='$id_kamar'");
    }
}
