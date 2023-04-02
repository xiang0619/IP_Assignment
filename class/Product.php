<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Product
 *
 * @author huatl
 */
class Product {
    private $id,$name,$productTypeID,$status,$unitPrice;
    
    public function __construct($id, $name, $productTypeID, $status, $unitPrice) {
        $this->id = $id;
        $this->name = $name;
        $this->productTypeID = $productTypeID;
        $this->status = $status;
        $this->unitPrice = $unitPrice;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getProductTypeID() {
        return $this->productTypeID;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getUnitPrice() {
        return $this->unitPrice;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setProductTypeID($productTypeID): void {
        $this->productTypeID = $productTypeID;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function setUnitPrice($unitPrice): void {
        $this->unitPrice = $unitPrice;
    }



}
