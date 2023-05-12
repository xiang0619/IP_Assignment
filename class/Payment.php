<?php
//Author : Tham Jun Yuan

class Payment {
    private $id;
    private $status;
    private $method;
    private $amount;
    private $order_id;
    private $items;
    private $currency;
   
        
    public function __construct($id, $status, $method, $amount, $order_id, $items, $currency) {
        $this->id = $id;
        $this->status = $status;
        $this->method = $method;
        $this->amount = $amount;
        $this->order_id = $order_id;
        $this->items = $this->getOrderItems($order_id);
        $this->currency = $currency;
    }
    
    public function getOrderItems($order_id){
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getOrder_id() {
        return $this->order_id;
    }

    public function getItems() {
        return $this->items;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setStatus($status): void {
        $this->status = $status;
    }

    public function setMethod($method): void {
        $this->method = $method;
    }

    public function setAmount($amount): void {
        $this->amount = $amount;
    }

    public function setOrder_id($order_id): void {
        $this->order_id = $order_id;
    }

    public function setItems($items): void {
        $this->items = $items;
    }

    public function setCurrency($currency): void {
        $this->currency = $currency;
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

