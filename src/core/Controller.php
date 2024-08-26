<?php
namespace App\Core;

use App\Core\ {
    Validator\Validator,
    Session\Session
};

abstract class Controller {
    protected Validator $validator;
    protected Session $session;
    protected $layout = "base";


    public function __construct() {
        Session::open();
    }

    public function renderView(string $view, array $data = [] ): void {
        extract($data);
        ob_start();
        require_once "../views/$view.html.php";
        $contentForView = ob_get_clean();
        require_once "../views/layout/$this->layout.layout.html.php";
    }

    public function renderJson(array $data) {
        echo json_encode($data);
    }

    public function redirectToRoot(string $controller, string $action = "") {
        header("Location:".WEBROOT."/?&controller=$controller&action=$action");
        exit;
    }

    public function path(string $controller, string $action){
        return WEBROOT."/?&controller=$controller&action=$action";
    }

    public function objectToArray($object) {
        if (is_object($object)) {
            return get_object_vars($object);
        }
        return $object; // Retourne tel quel si ce n'est pas un objet
    }

    public function dump($var) {
        echo "<pre>";
            var_dump($var);
        echo "</pre>";
    }
}
