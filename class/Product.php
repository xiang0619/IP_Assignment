<?php
require_once 'Observer.php';
/**
 * Description of Product
 *
 * @author huatl
 */
class Product implements Observer{

    private $quantity;
    private $id,$name,$productTypeID,$status,$unitPrice,$image,$description;
   
    public function __construct($id=null, $name=null, $productTypeID=null, $status=null, $unitPrice=null,$quantity=null,$image=null,$description=null) {
        $this->id = $id;
        $this->name = $name;
        $this->productTypeID = $productTypeID;
        $this->status = $status;
        $this->unitPrice = $unitPrice;
        $this->quantity = $quantity;
        $this->image = $image;
        $this->description = $description;
    }
    public function getImage() {
        return $this->image;
    }
    public function update(\Product $p) {
        $this->id = $p->id;
        $this->name = $p->name;
        $this->productTypeID = $p->productTypeID;
        $this->status = $p->status;
        $this->unitPrice = $p->unitPrice;
        $this->quantity = $p->quantity;
        $this->image = $p->image;
        $this->description = $p->description;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setImage($image): void {
        $this->image = $image;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

            public function getQuantity() {
        return $this->quantity;
    }
    public function setQuantity($quantity): void {
        $this->quantity = $quantity;
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
