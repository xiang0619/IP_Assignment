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

    public function retrieveProduct($productID) {
        return $this->adminProductDA->retrieve($productID);
    }
    
    public function retrieveProductType() {
        return $this->adminProductDA->retrieveProductType();
    }

    public function editProduct($productID,$name,$uploadDate,$quantity,$status,$unitPrice,$updatedID,$updatedDate,$createID,$createdDate,$image,$description, $productTypeID) {
        $product = $this->adminProductDA->retrieve($productID);
        $product->setName($name);
        $product->setUploadDate($uploadDate);
        $product->setQuantity($quantity);
        $product->setStatus($status);
        $product->setUnitPrice($unitPrice);
        $product->setUpdatedID($updatedID);
        $product->setUpdatedDate($updatedDate);
        $product->setCreateID($createID);
        $product->setCreatedDate($createdDate);
        $product->setImage($image);
        $product->setDescription($description);
        $product->setProductTypeID($productTypeID);
        $this->adminProductDA->edit($product);
    }

    public function deleteProduct($productID) {
        $this->adminProductDA->delete($productID);
    }
}
