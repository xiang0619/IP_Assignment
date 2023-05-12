<?php
//For the client code that uses the adapter
/**
 * 
 *
 * @author Tham Jun Yuan
 */
require_once __DIR__ . '/Shared/DesignPattern/IP_PaymentModuleInterface.php';
//require_once('/../Shared/DesignPattern/PaymentModuleInterface.php');
require_once('IP_StripePaymentAdapter.php');

class IP_PaymentModule implements IP_PaymentModuleInterface
{
    private $paymentGateway;

    public function __construct()
    {
        $this->paymentGateway = new IP_StripePaymentAdapter();
        // Set the Stripe API key from stripe.conf
        $this->paymentGateway->setApiKey(getenv('STRIPE_SECRET_KEY'));
    }

    public function processPayment($amount, $currency, $cardNumber, $expDate, $cvv)
{
    // Process the payment using the Stripe adapter
    $charge = $this->paymentGateway->processStripePayment($amount, $currency, $cardNumber, $expDate, $cvv);
    
    // Return the payment result
    if ($charge->paid) {
        return ['status' => 'success', 'message' => 'Payment successful'];
    } else {
        return ['status' => 'failure', 'message' => 'Payment failed'];
    }
}
}

