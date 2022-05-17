<?php

function base_url($url = false)
{
    if ($url == false) {
        return $base_url = BASE_URL;
    } else {
        return $base_url = BASE_URL . $url;
    }
}

function view($file, $data = false)
{
    $view = VIEW_PATH . $file . '.php';
    if (file_exists($view)) {
        return require_once($view);
    } else {
        return require_once(VIEW_PATH . $defaultErrorPage . '.php');
    }
}

function extend($file, $data = false)
{
    return require_once(VIEW_PATH . $file . '.php');
}

function session($name = false)
{
    $session = $_SESSION['' . $name . ''];
    return $session;
}

function redirect($to = false)
{
    if ($to != false) {
        return header('location:' . base_url() . $to . '');
    } else {
        return header('location:' . base_url() . '');
    }
    exit;
}

function request_method()
{
    $request_method = $_SERVER['REQUEST_METHOD'];
    return $request_method;
}

function dd($data)
{
    return exit(var_dump($data));
}

function indo_date($date)
{
    $pecah = explode('-', $date);
    $tanggal = $pecah[2];
    $bulan = $pecah[1];
    $tahun = $pecah[0];

    $format = $tanggal . '/' . $bulan . '/' . $tahun;
    return $format;
}

function rupiah($int)
{
    $rupiah = "Rp" . number_format($int, 0, ',', ',');
    return $rupiah;
}
