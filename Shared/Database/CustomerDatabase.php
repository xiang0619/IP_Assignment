<?php

include '../Shared/Helper/EmailHelper.php';
include '../Shared/Helper/EncryptionHelper.php';
include '../Shared/Helper/GenerateRandomCodeHelper.php';
include 'Database.php';
include '../class/Customer.php';

class CustomerDatabase {
    
    private $pdo;
    private $emailHelper;
    private $generateRandomCodeHelper;
    private $encryptionHelper;

    public function __construct()
    {
        $this->pdo = new Database();
        $this->emailHelper = new EmailHelper();
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
    
    public function resetCustomerPassword($email){
        $customer = $this->getCustomerByEmail($email);
        
        if($customer != null){
            $randomCode = $this->generateRandomCodeHelper->generateCode();
            $encryptedRandomCode = $this->encryptionHelper->encrypt($randomCode);
            
            $customer->setResetCode($randomCode);
            
            $this->updateCustomerResetCode($customer);
            
            try {
                return $this->sendEmail($customer, "Reset Password", "CustomerResetPasswordTemplate.html");
            } catch (Exception $e) {
                echo "Message could not be sent. Error: {$e->ErrorInfo}";
                return false;
            }
            
            return false;
        }
        return false;
    }
    
    private function sendEmail($customer, $subject, $emailTemplateName){
        
        return $this->emailHelper->sendEmailOAuth($customer->getEmail(), $subject, $this->emailHelper->LoadEmailTemplate($emailTemplateName,$customer));
    
    }
    
    private function updateCustomerResetCode($customer){        
        $this->pdo->open();
        
        
        $stmt = $this->pdo->prepare("UPDATE customer SET resetCode = ? WHERE email = ?");
        $stmt->execute([$customer->getResetCode() , $customer->getEmail()]);
        
        $this->pdo->close();
        return $stmt->rowCount();
    }
}