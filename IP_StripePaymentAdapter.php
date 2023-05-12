<?php
//For the adapter implementation
/**
 * 
 *
 * @author Tham Jun Yuan
 */
require_once 'Shared/DesignPattern/IP_StripePaymentAdapterInterface.php';
require_once 'IP_StripePaymentService.php';
require_once __DIR__ . '/Shared/Test/init.php';

class IP_StripePaymentAdapter implements IP_StripePaymentAdapterInterface {

    private $stripeService;

    public function __construct(IP_StripePaymentService $stripeService) {
        $this->stripeService = $stripeService;
    }

    public function processStripePayment($amount, $currency, $cardNumber, $expDate, $cvv) {
        \Stripe\Stripe::setApiKey($this->apiKey); // set the API key

        try {
            // create a token using the Stripe PHP SDK
            $token = \Stripe\Token::create([
                        'card' => [
                            'number' => $cardNumber,
                            'exp_month' => substr($expDate, 0, 2),
                            'exp_year' => substr($expDate, 2),
                            'cvc' => $cvv,
                        ],
            ]);

            // create a charge using the Stripe PHP SDK
            $charge = \Stripe\Charge::create([
                        'amount' => $amount,
                        'currency' => $currency,
                        'source' => $token,
            ]);

            // check if the charge is successful
            if ($charge->status == 'succeeded') {
                return true;
            } else {
                return false;
            }
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // handle any errors
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
        \Stripe\Stripe::setApiKey($apiKey);
    }

}
