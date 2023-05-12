<!-- @author: Tham Jun Yuan --> 
<?php
//For the Stripe payment service implementation

require_once __DIR__ . '/Shared/Test/init.php';

class IP_StripePaymentService implements IP_PaymentModuleInterface
{
    private $adapter;
    
    public function __construct(IP_StripePaymentAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function processPayment($amount, $currency, $cardNumber, $expDate, $cvv)
    {
        // call the Stripe API to process the payment
        $paymentResult = $this->adapter->processPayment($amount, $currency, $cardNumber, $expDate, $cvv);

        // return the payment result
        return $paymentResult;
    }
    
    
    
    public function setApiKey($apiKey)
    {
        $this->adapter->setApiKey($apiKey);
    }
}

