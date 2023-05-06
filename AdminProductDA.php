<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdminProductDA
 *
 * @author KahSeng
 */
include_once 'class/ProductAdmin.php';

class AdminProductDA {
    private $conn;

    public function __construct(PDO $pdo) {
        $this->conn = $pdo;
    }

    public function add(ProductAdmin $product) {
        $pstmt = $this->conn->prepare("INSERT INTO product(name,uploadDate,quantity,status,unitPrice,updatedID,updatedDate,createID,createdDate,image,description, productTypeID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"); //prepare an Insert Into statement
        //prepare statements are important feature of PDO which can help to prevent SQL injection attacks by separating SQL code from user input
        $pstmt ->bindParam(1, $product->getName());
        $pstmt ->bindParam(2, $product->getUploadDate());
        $pstmt ->bindParam(3, $product->getQuantity());
        $pstmt ->bindParam(4, $product->getStatus());
        $pstmt ->bindParam(5, $product->getUnitPrice());
        $pstmt ->bindParam(6, $product->getUpdatedID());
        $pstmt ->bindParam(7, $product->getUpdatedDate());
        $pstmt ->bindParam(8, $product->getCreateID());
        $pstmt ->bindParam(9, $product->getCreatedDate());
        $pstmt ->bindParam(10, $product->getImage());
        $pstmt ->bindParam(11, $product->getDescription());
        $pstmt ->bindParam(12, $product->getProductTypeID());
        $pstmt ->execute();
        
        header("Location: AdminProduct.php");
        exit();
    }

    public function retrieve($productID) {
        $query = "SELECT * FROM product WHERE productID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute([$productID]);
        $product = $pstmt->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
    
    public function retrieveProductType() {
        $query = "SELECT * FROM producttype";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute();
        $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function edit(AdminProduct $product) {
        // update product in database
    }

    public function delete($id) {
        // delete product from database by id
    }
}
