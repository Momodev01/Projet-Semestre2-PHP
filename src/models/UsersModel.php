<?php

namespace App\Models;

use App\Core\Model;

class UsersModel extends Model {

    public function findAllUsers() {
        $sql = "SELECT * FROM users";
        return $this-> executeSelect($sql);
    }

    public function connexion($email, $pwd) {
        $sql = "SELECT * FROM users WHERE email LIKE '$email'
                AND motdepass LIKE '$pwd'";
        return $this-> executeSelect($sql);
    }
}
