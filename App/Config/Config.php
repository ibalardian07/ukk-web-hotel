<?php

session_start();
date_default_timezone_set($defaultTimezone);

define('BASE_URL', '' . $base_url . '');

require_once(CONFIG_PATH . 'Model.php');
require_once(CONFIG_PATH . 'Controller.php');
require_once(CONTROL_PATH . 'Basecontroller.php');

if (isset($_GET['class'])) {
    $c = $_GET['class'];
    $c = ucfirst(strtolower($c));
    $c = rtrim($c, '/');
    $c = explode('/', $c);
    $controller = $c[0];
    unset($c[0]);

    $controllers = CONTROL_PATH . $controller . '.php';
    if (file_exists($controllers)) {
        require_once($controllers);
        if (class_exists($controller)) {
            $class = new $controller;
            if (!empty($c[1])) {
                $method = $c[1];
            } else {
                $method = $defaultMethod;
            }
            if (method_exists($class, $method)) {
                $params = (!empty($c)) ? array_values($c) : '';
                $class->$method($params);
            } else {
                $data = [
                    'msg' => 'Method ' . $controller . '::' . $method . ' Not Found',
                ];
                view('' . $defaultErrorPage . '', $data);
            }
        } else {
            $data = [
                'msg' => 'Class ' . $controller . ' Not Found',
            ];
            view('' . $defaultErrorPage . '', $data);
        }
    } else {
        $data = [
            'msg' => 'Controller ' . $controller . ' Not Found',
        ];
        view('' . $defaultErrorPage . '', $data);
    }
} else {
    $controllers = CONTROL_PATH . $defaultClass . '.php';
    if (file_exists($controllers)) {
        require_once($controllers);
        if (class_exists($defaultClass)) {
            $defaultClass = new $defaultClass;
            if (method_exists($defaultClass, $defaultMethod)) {
                $defaultClass->$defaultMethod();
            } else {
                $data = [
                    'msg' => 'Method ' . $defaultMethod . ' Not Found',
                ];
                view('erorr', $data);
            }
        } else {
            $data = [
                'msg' => 'Class ' . $defaultClass . ' Not Found',
            ];
            view('' . $defaultErrorPage . '', $data);
        }
    } else {
        $data = [
            'msg' => 'Controller ' . $defaultClass . ' Not Found',
        ];
        view('' . $defaultErrorPage . '', $data);
    }
}
