<?php

include '../Shared/Helper';

class CustomerDatabase {
    private $pdo;
    private $emailHelper;
    private $generateRandomCodeHelper;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->emailHelper = new EmailHelper();
        $this->generateRandomCodeHelper = new GenerateRandomCodeHelper();
    }

    public function getCustomerById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM customer WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCustomer($id, $name, $mobile)
    {
        $stmt = $this->pdo->prepare("UPDATE customer SET name = :name, mobile = :mobile WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name, 'mobile' => $mobile]);
        return $stmt->rowCount();
    }
    
    public function resetCustomerPassword($password){
        $randomCode = $this->generateRandomCodeHelper->generateCode();
        
        
        $stmt = $this->pdo->prepare("UPDATE customer SET password WHERE randomCode = :randomCode");
        $stmt->execute(['randomCode' => $randomCode, 'password' => $password]);
        return $stmt->rowCount();
    }
}
