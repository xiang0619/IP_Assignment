<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ProductAdmin
 *
 * @author KahSeng
 */
class ProductAdmin {
    private $productID,$name,$uploadDate,$quantity,$status,$unitPrice,$updatedID,$updatedDate,$createID,$createdDate,$image,$description, $productTypeID;
    
    public function __construct($productID, $name, $uploadDate, $quantity, $status, $unitPrice, $updatedID, $updatedDate, $createID, $createdDate, $image, $description, $productTypeID) {
        $this->productID = $productID;
        $this->name = $name;
        $this->uploadDate = $uploadDate;
        $this->quantity = $quantity;
        $this->status = $status;
        $this->unitPrice = $unitPrice;
        $this->updatedID = $updatedID;
        $this->updatedDate = $updatedDate;
        $this->createID = $createID;
        $this->createdDate = $createdDate;
        $this->image = $image;
        $this->description = $description;
        $this->productTypeID = $productTypeID;
    }
    
    public function getProductID() {
        return $this->productID;
    }

    public function getName() {
        return $this->name;
    }

    public function getUploadDate() {
        return $this->uploadDate;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getUnitPrice() {
        return $this->unitPrice;
    }

    public function getUpdatedID() {
        return $this->updatedID;
    }

    public function getUpdatedDate() {
        return $this->updatedDate;
    }

    public function getCreateID() {
        return $this->createID;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getProductTypeID() {
        return $this->productTypeID;
    }

    public function setProductID($productID): void {
        $this->productID = $productID;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setUploadDate($uploadDate): void {
        $this->uploadDate = $uploadDate;
    }

    public function setQuantity($quantity): void {
        $this->quantity = $quantity;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function setUnitPrice($unitPrice): void {
        $this->unitPrice = $unitPrice;
    }

    public function setUpdatedID($updatedID): void {
        $this->updatedID = $updatedID;
    }

    public function setUpdatedDate($updatedDate): void {
        $this->updatedDate = $updatedDate;
    }

    public function setCreateID($createID): void {
        $this->createID = $createID;
    }

    public function setCreatedDate($createdDate): void {
        $this->createdDate = $createdDate;
    }

    public function setImage($image): void {
        $this->image = $image;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setProductTypeID($productTypeID): void {
        $this->productTypeID = $productTypeID;
    }
}
