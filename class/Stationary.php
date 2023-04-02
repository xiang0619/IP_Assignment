<?php
require_once 'Product.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of stationary
 *
 * @author huatl
 */
class Stationary extends Product{
    private $qty,$uploadedID,$uploadedDate,$createdID,$createdDate,$uploadDate,$category;
    
    public function __construct($id, $name, $productTypeID, $status, $unitPrice, $uploadDate, $qty, $category, $uploadedID, $uploadedDate, $createdID, $createdDate) {
        parent::__construct($id, $name, $productTypeID, $status, $unitPrice);
        $this->uploadDate=$uploadDate;
        $this->qty=$qty;
        $this->category=$category;
        $this->uploadedID= $uploadedID;
        $this->createdID=$createdID;
        $this->createdDate=$createdDate;
    }
    
    public function getQty() {
        return $this->qty;
    }

    public function getUploadedID() {
        return $this->uploadedID;
    }

    public function getUploadedDate() {
        return $this->uploadedDate;
    }

    public function getCreatedID() {
        return $this->createdID;
    }

    public function getCreatedDate() {
        return $this->createdDate;
    }

    public function getUploadDate() {
        return $this->uploadDate;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setQty($qty): void {
        $this->qty = $qty;
    }

    public function setUploadedID($uploadedID): void {
        $this->uploadedID = $uploadedID;
    }

    public function setUploadedDate($uploadedDate): void {
        $this->uploadedDate = $uploadedDate;
    }

    public function setCreatedID($createdID): void {
        $this->createdID = $createdID;
    }

    public function setCreatedDate($createdDate): void {
        $this->createdDate = $createdDate;
    }

    public function setUploadDate($uploadDate): void {
        $this->uploadDate = $uploadDate;
    }

    public function setCategory($category): void {
        $this->category = $category;
    }


}
