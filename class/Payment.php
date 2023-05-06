<?php

//require_once('/Shared/Stripe/init.php');
//\Stripe\Stripe::setApiKey('sk_test_51N4IUNEd7cmSO65bnsVFQ59rs2hxKJvANEV2ZPsrcuw2Lvl3MNkr8dJhbadm5Yowv2cxrcc52xAMvr0lUBX9IiSW00y2ZokQ5z');

class Payment {
    private $token;
    private $amount;
    private $name;
    private $email;
    private $order_id;
    private $items;
    private $currency;
    
    
    public function __construct($token, $amount, $name, $email, $order_id, $items, $currency) {
        $this->token = $token;
        $this->amount = $amount;
        $this->name = $name;
        $this->email = $email;
        $this->order_id = $order_id;
        $this->items = $this->getOrderItems($order_id);
    }
    
    public function getOrderItems($order_id){
        
    }
    
    public function charge(){
        try{
            $charge = \Stripe\Charge::create(array(
                'amount' => $this->amount,
                'source' => $this->token,
                'description' => 'Charge for ' . $this->name
            ));
        } catch (\Stripe\Error\Card $e) {
            return false;
        }
    }
}

