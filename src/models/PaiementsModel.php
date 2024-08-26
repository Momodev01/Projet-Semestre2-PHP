<?php

namespace App\Models;

use App\Core\Model;

class PaiementsModel extends Model {

    public function findAllPaiements() {
        $sql = "SELECT * FROM paiements";

        return $this->executeSelect($sql);
    }

    public function paymentsDuJour() {
        $sql = "SELECT IFNULL(SUM(montantpmt), 0) AS total_paiements_du_jour
        FROM paiements WHERE DATE(datepmt) = CURDATE()";

        return $this->executeSelect($sql);
    }

}
