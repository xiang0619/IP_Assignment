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
                $staff = new Staff($row['ID'], $row['email'], $row['name'], $row['mobile'], $row['status'], $row['position'],
                                 $row['updatedID'], $row['updatedDate'], $row['createdID'], $row['createdDate'], $row['password']);
                self::$pdo->close();
                return $staff;
            }
        }else {
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
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = self::$pdo->prepare('UPDATE staff SET password = ? WHERE id = ?');

        $stmt->execute([$password,$id]);

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
    
    public function getStaffList(){
        self::$pdo->open();

        $stmt = self::$pdo->prepare('SELECT * FROM staff WHERE position = "normal staff"');
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $staffList = array();

        if ($result != null) {
            foreach ($result as $row) {
                $encryptedID = $this->encryptionHelper->encrypt($row['ID']);
                $staff = new Staff($encryptedID, $row['email'], $row['name'], $row['mobile'], $row['status'], $row['position'],
                                    $row['updatedID'], $row['updatedDate'], $row['createdID'], $row['createdDate'], $row['password']);
                $staffList[] = $staff;
            }

            self::$pdo->close();
            return $staffList;
        } else {
            self::$pdo->close();
            return null;
        }
    }

}
