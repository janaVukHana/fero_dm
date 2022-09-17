<?php

class DB {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'fero_dm';

    public function connect() {
        // dsn = data source name
        $dsn = "mysql:host = $this->host;dbname=$this->dbname;charset=utf8";
        // pdo = php data object
        $pdo = new PDO($dsn, $this->username, $this->password);
        // napvari acocijativni niz
        // ugradjene funkcije pdo classe
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}