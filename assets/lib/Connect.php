<?php

class Connect
{
    private $host = "192.168.3.87";
    private $username = "root";
    private $password = "";
    private $database = "databasedefault";
    protected $conn;

    public function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->database;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }
}
