<?php

include '../Shared/Helper/EncryptionHelper.php';
include '../Shared/Helper/GenerateRandomCodeHelper.php';
include 'Database.php';
include '../class/Customer.php';
include '../Shared/DesignPattern/ProfileObserver.php';

class CustomerDatabase implements ProfileObserver {
    
    private static $pdo;
    private $generateRandomCodeHelper;
    private $encryptionHelper;

    public function __construct()
    {
        self::$pdo = Database::getInstance();
        $this->generateRandomCodeHelper = new GenerateRandomCodeHelper();
        $this->encryptionHelper = new EncryptionHelper("Customer");
    }

    public function getProfile($id)
    {
        self::$pdo->open();
        
        $id = $this->encryptionHelper->decrypt($id);
        
        $stmt = self::$pdo->prepare("SELECT * FROM customer WHERE customerId = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $customer = new Customer($result['customerID'], $result['email'], $result['customerName'], $result['mobile'], $result['password']);
            self::$pdo->close();
            return $customer;
        } else {
            self::$pdo->close();
            return null;
        }
    }

    public function getCustomerByEmail($email){
        self::$pdo->open();
        
        $stmt = self::$pdo->prepare('SELECT * FROM customer WHERE email = ?');

        $stmt->execute([$email]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result != null) {
            foreach ($result as $row) {
               $customer = new Customer($row['customerID'], $row['email'], $row['customerName'], $row['mobile']);
               self::$pdo->close();
               return $customer;
            }
        } else {
            self::$pdo->close();
            return null;
        }
    }
    
    public function updateProfile($customer) {
        self::$pdo->open();
        
        $stmt = self::$pdo->prepare('UPDATE customer SET customerName = ?, mobile = ? WHERE customerId = ?');

        $stmt->execute([$customer->getName(),$customer->getMobile(),$customer->getId()]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result != null) {
            foreach ($result as $row) {
               $customer = new Customer($row['customerID'], $row['email'], $row['customerName'], $row['mobile']);
               self::$pdo->close();
               return $customer;
            }
        } else {
            self::$pdo->close();
            return null;
        }
    }
    
    public function updatePassword($id,$password) {
        self::$pdo->open();
        
        $password = $this->encryptionHelper->encrypt($password);
        
        $stmt = self::$pdo->prepare('UPDATE customer SET password = ? WHERE customerId = ?');

        $stmt->execute([$password,$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result != null) {
            foreach ($result as $row) {
               $customer = new Customer($row['customerID'], $row['email'], $row['customerName'], $row['mobile']);
               self::$pdo->close();
               return $customer;
            }
        } else {
            self::$pdo->close();
            return null;
        }
    }
}
