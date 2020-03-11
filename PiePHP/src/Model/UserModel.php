<?php
namespace Model;
use Core\Database;
use PDO;

class UserModel {
    private $email;
    private $password;
    
    private $bdd;
    
    public function __construct () {
        $this->bdd = new Database;
        $this->bdd = $this->bdd->getPdo();
    }
    public function save ($mail, $pass) {
        $query = "INSERT INTO users (email, password) VALUES ('$mail', '$pass')";
        $req = $this->bdd->prepare($query);
        $req->execute();
    }   
    public function check ($mail, $pass) {
        $query = "SELECT email, password FROM users WHERE email = '$mail' AND `password` = '$pass' ";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function readall () {
        $query = "SELECT email FROM users";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }
    public function update($mail, $id) {
        $query = "UPDATE users SET email = '$mail' WHERE id_users = '$id'";
        $req = $this->bdd->prepare($query);
        $req->execute();
    }
    public function id ($mail) {
        $query = "SELECT id_users FROM users WHERE email = '$mail'";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }
    public function delete ($id) {
        $query = "DELETE FROM users WHERE id_users = '$id'";
        $req = $this->bdd->prepare($query);
        $req->execute();
    }
}