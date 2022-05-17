<?php

class Basecontroller
{
    public function __construct()
    {
        $this->title = 'Hotel Hebat';
    }

    public function view($file, $data = [])
    {
        $view = VIEW_PATH . ucfirst($file) . '.php';
        if (file_exists($view)) {
            return require_once($view);
        } else {
            $data = [
                'msg' => 'View ' . $file . ' Not Found',
            ];
            return require_once(VIEW_PATH . 'Error' . '.php');
            exit;
        }
    }

    public function model($model)
    {
        require_once('./App/Models/' . $model . '.php');
        return new $model;
    }
}
