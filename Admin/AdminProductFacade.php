<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdminProductFacade
 *
 * @author KahSeng
 */

include_once '../class/ProductAdmin.php';
include_once 'AdminProductDA.php';

class AdminProductFacade {
    private $adminProductDA;

    public function __construct(PDO $pdo) {
        $this->adminProductDA = new AdminProductDA($pdo);
    }

    public function addProduct($name,$uploadDate,$quantity,$status,$unitPrice,$updatedID,$updatedDate,$createID,$createdDate,$image,$description, $productTypeID) {
        $product = new ProductAdmin("",$name,$uploadDate,$quantity,$status,$unitPrice,$updatedID,$updatedDate,$createID,$createdDate,$image,$description, $productTypeID);
        $this->adminProductDA->add($product);
    }
    
    public function addProductType($productTypeName) {      
        $this->adminProductDA->addProductType($productTypeName);
    }

    public function retrieveProduct($productID) {
        return $this->adminProductDA->retrieve($productID);
    }
    
    public function updateAdminProductXML($productID) {
        $this->adminProductDA->updateAdminProductXML($productID);
    }
    
    public function retrieveProductTypeName($productTypeID) {
        return $this->adminProductDA->retrieveProductTypeName($productTypeID);
    }
    
    public function retrieveProductTypeID($productTypeName) {
        return $this->adminProductDA->retrieveProductTypeID($productTypeName);
    }
    
    public function retrieveProductTypes() {
        return $this->adminProductDA->retrieveProductTypes();
    }

    public function editProduct($productID,$name,$uploadDate,$quantity,$status,$unitPrice,$updatedID,$updatedDate,$createID,$createdDate,$image,$description, $productTypeID) {
        $product = new ProductAdmin($productID,$name,$uploadDate,$quantity,$status,$unitPrice,$updatedID,$updatedDate,$createID,$createdDate,$image,$description, $productTypeID);       
        $this->adminProductDA->edit($product);
    }

    public function deleteProduct($productID) {
        $this->adminProductDA->delete($productID);
    }
}
