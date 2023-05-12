<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of IP_PaymentGatewayInterface
 *
 * @author Tham Jun Yuan
 */
interface IP_PaymentGatewayInterface {
    public function charge($amount, $cardNumber, $cvv, $expiryDate, $currency);
}
