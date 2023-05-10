<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdminServiceDA
 *
 * @author KahSeng
 */

class AdminServiceDA {
    private $conn;

    public function __construct(PDO $pdo) {
        $this->conn = $pdo;
    }
    
    public function retrieveServiceOrder() {
        $query = "SELECT * FROM cart";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute();
        $serviceOrders = array();
        while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
            $serviceOrders[] = $row;
        }
        return $serviceOrders;
    }
    
    public function retrieveCustomerName($customerID) {
        $query = "SELECT * FROM customer WHERE customerID = (?)";
        $pstmt = $this->conn->prepare($query);
        $pstmt ->bindParam(1, $customerID); 
        $pstmt->execute();
        $customerName = $pstmt->fetch(PDO::FETCH_ASSOC);
        return $customerName;
    }
    
    public function updateServiceStatus($cartID) {
        $updateStatus = "Downloaded";
        $query = "UPDATE cart SET downloadStatus = ? WHERE cartID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->bindParam(1, $updateStatus);
        $pstmt->bindParam(2, $cartID);       
        $pstmt->execute();
        
        header("Location: AdminService.php");
        exit();
    }
}
