<?php
require_once 'Person.php';

class Staff extends Person{
   private $status,$position,$updatedID,$updatedDate,$createdID,$createdDate;

   public function __construct($id, $email="", $name="",$mobile="", $status="", $position="", $updatedID="", $updatedDate="", $createdID="", $createdDate="", $password="") {
       parent::__construct($id, $email, $name,$mobile,$password);
       $this->mobile=$mobile;
       $this->status = $status;
       $this->position = $position;
       $this->updatedID = $updatedID;
       $this->updatedDate = $updatedDate;
       $this->createdID = $createdID;
       $this->createdDate = date("Y/m/d");

   }
   public function setStatus($status): void {
       $this->status = $status;
   }

   public function setPosition($position): void {
       $this->position = $position;
   }


   public function getStatus() {
       return $this->status;
   }

   public function getPosition() {
       return $this->position;
   }

   public function getUpdatedID() {
       return $this->updatedID;
   }

   public function getUpdatedDate() {
       return $this->updatedDate;
   }

   public function getCreatedID() {
       return $this->createdID;
   }

   public function getCreatedDate() {
       return $this->createdDate;
   }


   public function update(Staff $s){
       parent:: update($s);
       $this->id = $s->id;
       $this->email = $s->email;
       $this->name = $s->name;
       $this->status = $s->status;
       $this->position = $s->position;
       $this->updatedID = $s->updatedID;
       $this->updatedDate = $s->date("Y/m/d");
       $this->createdID = $s->createdID;
       $this->createdDate = $s->createdDate;
       $this->password = $s->password;
   }
   

}
