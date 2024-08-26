<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\ {
    ClientsModel,
    DettesModel,
    PaiementsModel
};

class DashboardController extends Controller {

    private ClientsModel $clientsModel;
    private DettesModel $dettesModel;
    private PaiementsModel $paiementsModel;

    public function __construct() {
        $this->clientsModel = new ClientsModel();
        $this->dettesModel = new DettesModel();
        $this->paiementsModel = new PaiementsModel();
        $this->load();
    }

    public function load() {
        $this-> statistics();
    }

    private function statistics() {
        parent::renderView('dashboard',
        [
            'clients' => $this->clientsModel->nbreClients(),
            'dettes' => $this->dettesModel->nbreDettes(),
            'paiements' => $this->paiementsModel->paymentsDuJour()
        ]);
    }
}
