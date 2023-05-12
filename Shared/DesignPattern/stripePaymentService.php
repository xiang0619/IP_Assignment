<?php
//For the Stripe payment service implementation

require_once __DIR__ . '/../Stripe/init.php';
//require_once('../Stripe/init.php'); // require the Stripe library
//require_once(__DIR__ . '/Test/init.php');

class IP_StripePaymentService
{
    private $apiKey;
    
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }
    
    public function processPayment($amount, $currency, $token)
    {
        \Stripe\Stripe::setApiKey($this->apiKey);
        
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $amount,
                'currency' => $currency,
                'source' => $token,
            ]);
            return $charge;
        } catch (\Stripe\Exception\CardException $e) {
            // handle errors
        }
    }
    
    public function getTransactionHistory()
    {
        \Stripe\Stripe::setApiKey($this->apiKey);
        
        try {
            $transactions = \Stripe\Charge::all();
            return $transactions;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // handle errors
        }
    }
}
