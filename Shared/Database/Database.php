<?php

class Database{
    private $host = 'localhost';
    private $dbname = 'ip';
    private $username = 'myusername';
    private $password = 'mypassword';
    private $conn;
    
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }
    
}

