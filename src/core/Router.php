<?php
namespace App\Core;

use App\Controllers\SecurityController;

class Router {
    public static function run() {
        if (isset($_REQUEST['controller'])) {
            $controller = ucfirst($_REQUEST['controller']).'Controller';
            $namespace = "App\\Controllers\\";
            $controllerClass = $namespace . $controller;
            $fileController = "../src/controllers/$controller.php";

            if (file_exists($fileController)) {
                require_once $fileController;
                $controller = new $controllerClass();
            } else {
                $controller = new SecurityController();
            }
        } else {
            $controller = new SecurityController();
        }
    }
}
