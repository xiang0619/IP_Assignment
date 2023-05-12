<?php
//For the Stripe payment service interface

interface IP_StripePaymentInterface {
    // Process a payment using Stripe
    public function processStripePayment($amount, $currency, $token);

    // Refund a payment using Stripe
    public function refundStripePayment($chargeId);
}

