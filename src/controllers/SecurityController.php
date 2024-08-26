<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\ {
    UsersModel,
    ClientsModel,
    DettesModel,
    PaiementsModel
};

use App\Core\Session\Session;
use App\Core\Validator\Validator;

class SecurityController extends Controller {

    private ClientsModel $clientsModel;
    private DettesModel $dettesModel;
    private PaiementsModel $paiementsModel;
    private UsersModel $userModel;

    public function __construct() {
        session_start();
        $this->userModel = new UsersModel();
        $this->clientsModel = new ClientsModel();
        $this->dettesModel = new DettesModel();
        $this->paiementsModel = new PaiementsModel();
        $this->load();
    }

    public function load() {
        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
            
            if ($action == "login") {
                $this->login();
            }
            elseif ($action == 'logout') {
                Session::close();
                $this->layout = 'connexion';
                parent::renderView('security/login');
            }
        }
        else {
            $this->layout = 'connexion';
            parent::renderView('security/login');
        }
    }

    private function login() {
        if (!Validator::isEmpty('email')) {
            Validator::isEmail('email');
        }
        Validator::isEmpty('motdepass');
        if (Validator::validate()) {
            $connected = $this-> userModel-> connexion($_POST['email'], $_POST['motdepass']);
            if ($connected) {
                $email = $connected[0]->email;
                Session::setObject('userConnected', $connected);
                $this-> redirectAfterConnect($email);
            }
        }
        else {
            $this->layout = 'connexion';
            parent::renderView('security/login', ['errors' => Validator::$errors]);
        }
    }

    public function redirectAfterConnect(string $email) {
        if ($email === "boutikier@gmail.com") {
            parent::redirectToRoot('Dashboard');
        } else {
            $this->layout = 'connexion';
            parent::renderView('security/login');
        }
        
    }
}
