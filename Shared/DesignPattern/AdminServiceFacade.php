<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdminServiceFacade
 *
 * @author Chin Kah Seng
 */

include_once '../Shared/Database/AdminServiceDA.php';

class AdminServiceFacade {
    private $adminProductServiceDA;

    public function __construct(PDO $pdo) {
        $this->adminServiceDA = new AdminServiceDA($pdo);
    }

    public function retrieveServiceOrder() {
        return $this->adminServiceDA->retrieveServiceOrder();
    }
    
    public function retrieveCustomerName($customerID) {
        return $this->adminServiceDA->retrieveCustomerName($customerID);
    }
    
    public function updateServiceStatus($cartID) {
        return $this->adminServiceDA->updateServiceStatus($cartID);
    }
}
