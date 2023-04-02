<?php
require_once 'Product.php';

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
class Service extends Product{
    
    private $date,$numberOfPage;
    
    public function __construct($id, $name, $productTypeID, $status, $unitPrice,$date,$numberOfPage) {
        parent::__construct($id, $name, $productTypeID, $status, $unitPrice);
        $this->date= $date;
        $this->numberOfPage=$numberOfPage;
    }
    public function getDate() {
        return $this->date;
    }
    public function getNumberOfPage() {
        return $this->numberOfPage;
    }

    public function setDate($date): void {
        $this->date = $date;
    }

    public function setNumberOfPage($numberOfPage): void {
        $this->numberOfPage = $numberOfPage;
    }



}
