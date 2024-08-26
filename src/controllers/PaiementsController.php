<?php

namespace App\Controllers;
use App\Models\PaiementsModel;

class PaiementsController {

    private PaiementsModel $paiementsModel;

    public function __construct() {
        $this->paiementsModel = new PaiementsModel;
        $this->load();
    }

    public function load() {
        echo 'Hello';
    }
}
