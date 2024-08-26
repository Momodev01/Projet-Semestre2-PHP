<?php

namespace App\Models;

use App\Core\Model;

class DettesModel extends Model {

    public function findAllDettes() {
        $sql = "SELECT dt.*, cl.*, ct.*,
            IFNULL((SELECT SUM(p.montantpmt) FROM paiements p WHERE p.iddette = dt.iddette), 0) AS montantversé,
            (dt.montantdette - IFNULL((SELECT SUM(p.montantpmt) FROM paiements p WHERE p.iddette = dt.iddette), 0)) AS montantdu
        FROM dettes dt
        JOIN clients cl ON dt.idcl = cl.idcl
        JOIN categories ct ON cl.idcat = ct.idcat";

        return $this->executeSelect($sql);
    }

    public function findDettesByEtat(string $etat = "Non soldée") {
        $sql = "SELECT dt.*, cl.*, ct.*,
            IFNULL((SELECT SUM(p.montantpmt) FROM paiements p WHERE p.iddette = dt.iddette), 0) AS montantversé,
            (dt.montantdette - IFNULL((SELECT SUM(p.montantpmt) FROM paiements p WHERE p.iddette = dt.iddette), 0)) AS montantdu
        FROM dettes dt
        JOIN clients cl ON dt.idcl = cl.idcl
        JOIN categories ct ON cl.idcat = ct.idcat
        WHERE dt.etat LIKE '$etat' ";

        return $this->executeSelect($sql);
    }
    public function findDettesByTel(string $tel) {
        $sql = "SELECT dt.*, cl.*, ct.*,
            IFNULL((SELECT SUM(p.montantpmt) FROM paiements p WHERE p.iddette = dt.iddette), 0) AS montantversé,
            (dt.montantdette - IFNULL((SELECT SUM(p.montantpmt) FROM paiements p WHERE p.iddette = dt.iddette), 0)) AS montantdu
        FROM dettes dt
        JOIN clients cl ON dt.idcl = cl.idcl
        JOIN categories ct ON cl.idcat = ct.idcat
        WHERE cl.telephone LIKE '$tel' ";

        return $this->executeSelect($sql);
    }
    
    public function nbreDettes() {
        $sql = "SELECT COUNT(*) AS nbre_dettes FROM dettes WHERE etat LIKE 'Non soldée' ";

        return $this->executeSelect($sql);
    }

    public function addDette(array $dette) {
        $sql = "INSERT INTO `dettes` (datedette, montantdette, etat, idcl)
                VALUES (:datedette, :montantdette, :etat, :idcl) ";
        
        return $this->executeUpdate($sql, $dette);
    }

}
