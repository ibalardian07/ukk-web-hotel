<?php

class Home extends Basecontroller
{
    public function index()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Home',
            'profile' => $this->model('PenggunaModel')->getInfo(),
        ];
        $this->view('template/header', $data);
        $this->view('home', $data);
        $this->view('template/footer', $data);
    }

    public function kamar()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Kamar',
            'profile' => $this->model('PenggunaModel')->getInfo(),
            'kamar' => $this->model('KamarModel')->getKamar(),
            'fasilitas' => $this->model('FasilitaskamarModel'),
        ];
        $this->view('template/header', $data);
        $this->view('kamar', $data);
        $this->view('template/footer', $data);
    }
}
