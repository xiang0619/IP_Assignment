<?php

include '../Shared/Helper/EncryptionHelper.php';
include '../Shared/Helper/GenerateRandomCodeHelper.php';
include 'Database.php';
include '../class/Staff.php';
include '../Shared/DesignPattern/ProfileObserver.php';

class StaffDatabase implements ProfileObserver{
     private static $pdo;
    private $generateRandomCodeHelper;
    private $encryptionHelper;

    public function __construct()
    {
        self::$pdo = Database::getInstance();
        $this->generateRandomCodeHelper = new GenerateRandomCodeHelper();
        $this->encryptionHelper = new EncryptionHelper("Staff");
    }

    public function getProfile($id)
    {
        self::$pdo->open();
        
        $id = $this->encryptionHelper->decrypt($id);
        
        $stmt = self::$pdo->prepare("SELECT * FROM staff WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $staff = new Staff($result['ID'], $result['email'], $result['name'], $result['mobile'],$result['status'],$result['position'],
                                $result['updatedID'],$result['updatedDate'],$result['createdID'],$result['createdDate'],$result['password']);
            self::$pdo->close();
            return $staff;
        } else {
            self::$pdo->close();
            return null;
        }
    }

    public function getStaffByEmail($email){
        self::$pdo->open();
        
        $stmt = self::$pdo->prepare('SELECT * FROM staff WHERE email = ?');

        $stmt->execute([$email]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result != null) {
            foreach ($result as $row) {
               $staff = new Staff($result['ID'], $result['email'], $result['name'], $result['mobile'],$result['status'],$result['position'],
                                $result['updatedID'],$result['updatedDate'],$result['createdID'],$result['createdDate'],$result['password']);
               self::$pdo->close();
               return $staff;
            }
        } else {
            self::$pdo->close();
            return null;
        }
    }
    
    public function updateProfile($staff) {
        self::$pdo->open();
        
        $stmt = self::$pdo->prepare('UPDATE staff SET name = ?, mobile = ? WHERE id = ?');

        $stmt->execute([$staff->getName(),$staff->getMobile(),$staff->getId()]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result != null) {
            foreach ($result as $row) {
               $staff = new Staff($result['ID'], $result['email'], $result['name'], $result['mobile'],$result['status'],$result['position'],
                                $result['updatedID'],$result['updatedDate'],$result['createdID'],$result['createdDate'],$result['password']);
               self::$pdo->close();
               return $staff;
            }
        } else {
            self::$pdo->close();
            return null;
        }
    }
    
    public function updatePassword($id,$password) {
        self::$pdo->open();
        
        $password = $this->encryptionHelper->encrypt($password);
        
        $stmt = self::$pdo->prepare('UPDATE staff SET password = ? WHERE id = ?');

        $stmt->execute([$password,$id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result != null) {
            foreach ($result as $row) {
               $staff = new Customer($row['customerID'], $row['email'], $row['customerName'], $row['mobile']);
               self::$pdo->close();
               return $staff;
            }
        } else {
            self::$pdo->close();
            return null;
        }
    }
}