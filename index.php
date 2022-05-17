<?php

# Framework MVC ini dikembangkan oleh : Muh Ardian Iqbal

# instagram: https://www.instagram.com/ibalardian_/
# github: https://www.github.com/ibalardian_/
# website: https://www.ibalardian.xyz/

define('CONFIG_PATH', './App/Config/');
define('CONTROL_PATH', './App/Controllers/');
define('VIEW_PATH', './App/Views/');

# Pengaturan default untuk Framework MVC ini

$defaultClass = 'home';
$defaultMethod = 'index';
$defaultErrorPage = 'Error';
$defaultTimezone = 'Asia/Jakarta';

$base_url = 'http://localhost/ukk_mvc/';

// Menjalankan File Config
$config = require_once(CONFIG_PATH . 'Config.php');
