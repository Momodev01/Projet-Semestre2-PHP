<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session\Session;
use App\Models\ {
    ArticlesModel,
    ClientsModel,
    DettesModel
};

class DettesController extends Controller {
    private DettesModel $dettesModel;
    private ClientsModel $clientsModel;
    private ArticlesModel $articlesModel;

    public function __construct() {
        $this->dettesModel = new DettesModel();
        $this->clientsModel = new ClientsModel();
        $this->articlesModel = new ArticlesModel();
        
        $this->load();
    }
    
    public function load() {
        $action = $_REQUEST['action'];
        if (isset($action)) {
            if ($action == "filtreDettes") {
                $this->listeDettes();
            }
            elseif ($action == "searchTel") {
                $this->listeDettesByTel();
            }
            elseif ($action == "searchClient") {
                $this->infosClient();
            }
            elseif ($action == "searchArticle") {
                $this->infosArticle();
            }
            elseif ($action == "ajoutdette") {
                $this->showAddDetteView();
            }
            elseif ($action == "savedette") {
                $this->saveDette();
            }
            else {
                $this->listeDettes();
            }
        }
        else {
            $this->listeDettes();
        }
    }

    private function listeDettes() {
        $index = 'dettes/index';
        
        if (isset($_REQUEST['etat'])) {
            $etat = $_REQUEST['etat'];
            if ($etat == "Tous") {
                parent::renderView($index, ['dettes' => $this->dettesModel->findAllDettes()]);
            }
            elseif ($etat == "NonSoldees") {
                parent::renderView($index, ['dettes' => $this->dettesModel->findDettesByEtat()]);
            }
            elseif ($etat == "Soldees") {
                parent::renderView($index, ['dettes' => $this->dettesModel->findDettesByEtat("Soldée")]);
            }
        }
        else {
            parent::renderView($index, ['dettes' => $this->dettesModel->findDettesByEtat()]);
        }
    }
    
    private function listeDettesByTel() {
        $tel = $_REQUEST['telephone'];
        $index = 'dettes/index';

        if (isset($tel) && !empty($tel)) {
            parent::renderView($index, ['dettes' => $this->dettesModel->findDettesByTel($tel)]);
        }
    }

    private function infosClient() {
        $tel = $_REQUEST['telephone'];
        if (isset($tel) && !empty($tel)) {
            $client = $this->clientsModel->findClientsByTel($tel);
            Session::set('client', $client);
        }
        $this->showAddDetteView();
    }
    
    private function infosArticle() {
        $lib = $_REQUEST['libelle'];
        if (isset($lib) && !empty($lib)) {
            $article = $this->articlesModel->findArticleByName($lib);
            Session::set('article', $article);
        }
        $this->showAddDetteView();
    }
    
    private function showAddDetteView() {
        $client = Session::get('client');
        $article = Session::get('article');
        
        parent::renderView('dettes/ajoutdette', ['client' => $client, 'article' => $article]);
    }
    

    // private function infosClient() {
    //     $tel = $_REQUEST['telephone'];
    //     $ajout = 'dettes/ajoutdette';

    //     parent::renderView($ajout, ['client' => $this->clientsModel->findClientsByTel($tel)]);
    // }

    // private function infosArticle() {
    //     $lib = $_REQUEST['libelle'];
    //     $ajout = 'dettes/ajoutdette';

    //     parent::renderView($ajout, ['article' => $this->articlesModel->findArticleByName($lib)]);
    // }

    // private function showAddDetteView() {
    //     parent::renderView('dettes/ajoutdette');
    // }

    // private function init_cmd() {
    //     $dette = [
    //         "client" => [
    //             'idcl' => $_REQUEST[''],
    //             'telephone' => $_REQUEST[''],
    //             'nom' => $_REQUEST[''],
    //             'prenom' => $_REQUEST[''],
    //             'nomcat' => $_REQUEST[''],
    //         ],
    //         "article" => [
    //             'idart' => $_REQUEST[''],
    //             'libelle' => $_REQUEST[''],
    //             'prix' => $_REQUEST[''],
    //             'qteStock' => $_REQUEST['']
    //         ]
    //     ];
    //     Session::set("dette", $dette);
    // }

    private function saveDette() {
        $dette = Session::get("dette");


        Session::remove('client');
        Session::remove('article');
    }
    
}
