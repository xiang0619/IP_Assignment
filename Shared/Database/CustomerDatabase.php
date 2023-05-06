<?php

include '../Shared/Helper/EncryptionHelper.php';
include '../Shared/Helper/GenerateRandomCodeHelper.php';
include 'Database.php';
include '../class/Customer.php';

class CustomerDatabase {
    
    private $pdo;
    private $generateRandomCodeHelper;
    private $encryptionHelper;

    public function __construct()
    {
        $this->pdo = new Database();
        $this->generateRandomCodeHelper = new GenerateRandomCodeHelper();
        $this->encryptionHelper = new EncryptionHelper("Customer");
    }

    public function getCustomerById($id)
    {
        $this->pdo->open();
        
        $stmt = $this->pdo->query("SELECT * FROM customer WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $customer = new Customer($result['id'], $result['name'], $result['email'], $result['mobile']);
            $this->pdo->close();
            return $customer;
        } else {
            return null;
        }
    }

    public function getCustomerByEmail($email){
        $this->pdo->open();
        
        $stmt = $this->pdo->prepare('SELECT * FROM customer WHERE email = ?');

        $stmt->execute([$email]);

        $result = $this->pdo->fetchAll($stmt);
        
        if ($result != null) {
            foreach ($result as $row) {
               $customer = new Customer($row['customerID'], $row['email'], $row['customerName'], $row['mobile']);
               $this->pdo->close();
               return $customer;
            }
        } else {
            return null;
        }
    }
    
    public function updateCustomer($id, $name, $mobile)
    {
        $this->pdo->open();
        $stmt = $this->pdo->query("UPDATE customer SET name = ?, mobile = ? WHERE id = ?");
        $stmt->execute([$name, $mobile, $id]);
        $this->pdo->close();
        return $stmt->rowCount();
    }
    
}