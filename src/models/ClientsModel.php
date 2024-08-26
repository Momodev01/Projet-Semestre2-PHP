<?php

namespace App\Models;

use App\Core\Model;

class ClientsModel extends Model {

    public function findAllClients() {
        $sql = "SELECT cl.*, ct.*
        FROM clients cl
        JOIN categories ct ON cl.idcat = ct.idcat";

        return $this->executeSelect($sql);
    }
    
    public function findClientsByCategorie(string $categorie) {
        $sql = "SELECT cl.*, ct.*
        FROM clients cl
        JOIN categories ct ON cl.idcat = ct.idcat
        WHERE ct.nomcat LIKE '$categorie'";

        return $this->executeSelect($sql);
    }
    public function findClientsByTel(string $tel) {
        $sql = "SELECT cl.*, ct.*
        FROM clients cl
        JOIN categories ct ON cl.idcat = ct.idcat
        WHERE cl.telephone LIKE '$tel'";

        return $this->executeSelect($sql);
    }
    
    public function nbreClients() {
        $sql = "SELECT COUNT(*) AS nbre_clients FROM clients";

        return $this->executeSelect($sql);
    }

}
