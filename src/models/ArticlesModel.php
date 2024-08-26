<?php

namespace App\Models;

use App\Core\Model;

class ArticlesModel extends Model {


    public function findAllArticles() {
        $sql = "SELECT * FROM articles";

        return $this->executeSelect($sql);
    }

    public function nbreArticles() {
        $sql = "SELECT COUNT(*) AS nbre_articles FROM articles";

        return $this->executeSelect($sql);
    }

    public function findArticleByName($lib) {
        $sql = "SELECT * FROM articles WHERE libelle LIKE '$lib'";

        return $this->executeSelect($sql);
    }
}
