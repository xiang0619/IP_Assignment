<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of IP_StripePaymentGateway
 *
 * @author Tham Jun Yuan
 */
require_once __DIR__ . '/Shared/Test/init.php';
require_once 'IP_PaymentGatewayInterface.php';

use Stripe\Stripe;

class IP_StripePaymentGateway implements IP_PaymentGatewayInterface {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;

        Stripe::setApiKey($apiKey);
    }

    public function charge($amount, $cardNumber, $cvv, $expiryDate, $currency) {
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $amount * 100,
                'currency' => $currency,
                'source' => [
                    'object' => 'card',
                    'number' => $cardNumber,
                    'exp_month' => substr($expiryDate, 0, 2),
                    'exp_year' => substr($expiryDate, 2),
                    'cvc' => $cvv,
                ],
            ]);

            return $charge;
        } catch (\Stripe\Exception\CardException $e) {
            // The card has been declined
            throw new Exception('Card declined');
        }
    }
}
