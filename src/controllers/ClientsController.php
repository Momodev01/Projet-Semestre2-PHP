<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\ClientsModel;

class ClientsController extends Controller {

    private ClientsModel $clientsModel;

    public function __construct() {
        $this->clientsModel = new ClientsModel();
        $this->load();
    }

    public function load() {
        $this-> listeClients();
    }

    private function listeClients() {
        $categorie = $_REQUEST['categorie'];
        $index = 'clients/index';
        
        if (isset($categorie)) {
            if ($categorie == "Tous") {
                parent::renderView($index, ['clients' => $this->clientsModel->findAllClients()]);
            }
            elseif ($categorie == "NonSolvables") {
                parent::renderView($index, ['clients' => $this->clientsModel->findClientsByCategorie("Non solvable")]);
            }
            elseif ($categorie == "Solvables") {
                parent::renderView($index, ['clients' => $this->clientsModel->findClientsByCategorie("Solvable")]);
            }
            elseif ($categorie == "Nouveaux") {
                parent::renderView($index, ['clients' => $this->clientsModel->findClientsByCategorie("Nouveau")]);
            }
            elseif ($categorie == "Fideles") {
                parent::renderView($index, ['clients' => $this->clientsModel->findClientsByCategorie("Fidèle")]);
            }
        }
        else {
            parent::renderView($index, ['clients' => $this->clientsModel->findAllClients()]);
        }
    }

    // public function searchClientByTel() {
    //     $index = 'clients/index';
    //     parent::renderView($index, ['clients' => $this->clientsModel->findClientsByTel($tel)]);
    // }
}
