<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Person
 *
 * @author huatl
 */
class Person {
    private $id,$email,$name,$mobile,$password;
    
    public function __construct($id,$email,$name,$mobile,$password) {
        $this->id=$id;
        $this->email=$email;
        $this->name=$name;
        $this->mobile=$mobile;
        $this->password=$password;
    }
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getMobile() {
        return $this->mobile;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setMobile($mobile): void {
        $this->mobile = $mobile;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }
    public function update(Person $p){
        $this->email=$p->email;
        $this->name =$p->name;
        $this->mobile=$p->mobile;
        $this->password=$p->password;
        
    }
    public function isEqual(Person $p): bool{
        if ($this->id == $p->id) {

            return true;
        } 
        else {
            return false;
        }
    }
    
}
