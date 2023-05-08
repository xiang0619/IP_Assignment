<?php
require_once 'Person.php';

class Customer extends Person{
    private $resetCode;
    
    public function __construct($customerID = "", $email = "", $customerName = "", $mobile = "", $password = "", $resetCode = "") {
        parent::__construct($customerID, $email, $customerName, $mobile, $password);
        
        $this->resetCode = $resetCode;
    }

    public function setResetCode($resetCode): void {
        $this->resetCode = $resetCode;
    }


    public function getResetCode() {
        return $this->resetCode;
    }
    
    public function update(Person $p): void {
        parent::update($p);
        if($p instanceof Customer){
            $this->resetCode = $p->resetCode;
        }
    }

}
