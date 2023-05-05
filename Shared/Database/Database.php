<?php

class Database{
    private $host = 'localhost';
    private $dbname = 'ip';
    private $username = 'root';
    private $password = '';
    private $pdo;
    
    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    
    public function open(){
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    public function query($sql) {
        $stmt = $this->pdo->query($sql);

        if ($stmt && $stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }

    public function execute($stmt) {
        return $stmt->execute();
    }

    public function fetchAll($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert($table, $data) {
        $keys = array_keys($data);
        $values = array_values($data);
        $placeholders = implode(',', array_fill(0, count($keys), '?'));
        $sql = "INSERT INTO $table (" . implode(',', $keys) . ") VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($values);
    }

    public function update($table, $data, $where) {
        $set = array();
        $values = array();
        
        foreach ($data as $key => $value) {
            $set[] = "$key = ?";
            $values[] = $value;
        }
        
        $where_clause = array();
        foreach ($where as $key => $value) {
            $where_clause[] = "$key = ?";
            $values[] = $value;
        }
        
        $sql = "UPDATE $table SET " . implode(',', $set) . " WHERE " . implode(' AND ', $where_clause);
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($values);
    }

    public function delete($table, $where) {
        $where_clause = array();
        $values = array();
        foreach ($where as $key => $value) {
            $where_clause[] = "$key = ?";
            $values[] = $value;
        }
        $sql = "DELETE FROM $table WHERE " . implode(' AND ', $where_clause);
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($values);
    }
    
    public function close() {
        $this->pdo = null;
    }
}

