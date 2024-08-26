<?php
namespace App\Core;

abstract class  Model
{
    public string $table;
    public string $class;
    public string $columns;
    public string $values;

    public function findAll() {
        $calledClass = get_called_class();
        $table = str_replace('Model', "", $calledClass);
        $sql = "SELECT * FROM $table";
        return $this-> executeSelect($sql);
    }

    public function findById(int $id) {
        $calledClass = get_called_class();
        $table = str_replace('Model', "", $calledClass);
        $sql = "SELECT * FROM $table WHERE id = $id";
        $this-> executeSelect($sql, true);
    }
    
    protected function executeSelect(string $sql, bool $single = false): array {
        $calledClass = get_called_class();
        $result = $this->openConnexion()->query($sql);
        if (!$single) {
            return $result->fetchAll(\PDO::FETCH_CLASS, $calledClass);
        }
        return $result->fetch(\PDO::FETCH_CLASS, $calledClass);
    }

    protected function executeUpdate(string $sql, array $data){
        // Executer la requete UPDATE
        $connex = $this->openConnexion();
        $statement = $connex->prepare($sql);
        $statement->execute($data);
        $this->closeConnexion($connex);
    }

    protected function openConnexion() {
        return new \PDO('mysql:host=localhost;dbname=gestionboutik;charset=utf8', 'root', '');
    }

    protected function closeConnexion($connex){
        // Fermer la connexion
        return $connex = null;
    }
    public function  dump($variable){
        echo "<pre>";
            var_dump($variable);
        echo "</pre>";
        exit("C'est OK");
    }

}
