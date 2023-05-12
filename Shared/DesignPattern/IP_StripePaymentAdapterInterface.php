<?php
//For the adapter interface

interface IP_StripePaymentAdapterInterface {
    public function processStripePayment($amount, $currency, $cardNumber, $expDate, $cvv);
    public function setApiKey($apiKey);
}

