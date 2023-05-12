<?php
//For the existing payment module interface

interface IP_PaymentModuleInterface {
    public function processPayment($amount, $currency, $cardNumber, $expDate, $cvv);
}

