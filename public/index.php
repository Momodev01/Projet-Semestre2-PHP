<?php

require_once "../vendor/autoload.php";

define('ROOT', "C:\Users\Victus\Desktop\Projet-Semestre2-PHP");
define('WEBROOT', "http://localhost:7600");

use App\Core\Router;

Router::run();
