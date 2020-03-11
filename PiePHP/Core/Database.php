<?php

namespace Core;
use PDO;

class Database {
    private $host = "localhost";
    private $db   = "PiePHP";
    private $dbuser = "root";
    private $dbpass = "root";

    public function getPdo() {  
        
        $pdoOpt = array('PDO::MYSQL_ATTR_INIT_COMMAND' => 'SET NAMES utf8');
        $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db . ';', $this->dbuser, $this->dbpass, $pdoOpt);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
} 