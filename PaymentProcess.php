<?php

// include necessary files
//require_once 'IP_PaymentModule.php';
//require_once 'IP_StripePaymentAdapter.php';
//require_once 'IP_StripePaymentService.php';
require_once 'IP_StripePaymentGateway.php';
include 'config.php';
include './Shared/Helper/EncryptionHelper.php';

session_start();
$z = new EncryptionHelper("Customer");

//decrypt id 
$customerID = $z->decrypt($_SESSION['customerID']);

if ($customerID == null) {
    echo '<script>';
    echo "alert('Please log in first.');";
    echo '</script>';
    header("Location: ./CustomerLogin.php");
}



// Retrieve payment information from the form
$cardNumber = $_POST['cardNumber'] ?? '';
$expDate = $_POST['expDate'] ?? '';
$cvv = $_POST['cvv'] ?? '';
$amount = $_POST['price'];
$currency = 'MYR';
//$current_time = date('Y-m-d H:i:s');
//$method = 'Stripe';

//$apiKey = getenv('STRIPE_SECRET_KEY');
$apiKey = 'sk_test_51N4IUNEd7cmSO65bnsVFQ59rs2hxKJvANEV2ZPsrcuw2Lvl3MNkr8dJhbadm5Yowv2cxrcc52xAMvr0lUBX9IiSW00y2ZokQ5z';
$gateway = new IP_StripePaymentGateway($apiKey);

try {

   
    //$charge = $gateway->charge(1000, '4242424242424242', '123', '1225', 'myr');
    
    
    // assuming $customerID has already been set from the session
    $cartID = null;
    $productID = null;

// retrieve cart ID from database using customer ID
    $stmt = $dbc->prepare("SELECT cartID FROM cart WHERE customerID = ?");
    $stmt->bind_param('i', $customerID);
    $stmt->execute();
    $stmt->bind_result($cartID);
    $stmt->fetch();
    $stmt->close();

    if ($cartID) {
        // retrieve product ID from cart using cart ID
        $stmt = $dbc->prepare("SELECT productID FROM cart WHERE cartID = ?");
        $stmt->bind_param('i', $cartID);
        $stmt->execute();
        $stmt->bind_result($productID);
        $stmt->fetch();
        $stmt->close();

        if ($productID) {
            // insert new payment record into payment table
            $method = 'Stripe'; // example payment method
            $current_time = date('Y-m-d H:i:s');
            
             $charge = $gateway->charge($amount, $cardNumber, $cvv, $expDate, $currency);

            $stmt = $dbc->prepare("INSERT INTO payment (customerID, paymentMethod, paymentDate, productID, totalPayment, payment_status) VALUES (?, ?, ?, ?, ?, 'Paid')");
            $stmt->bind_param('issii', $customerID, $method, $current_time, $productID, $amount);
            $stmt->execute();
            $stmt->close();
            
            
        }
    }



    echo '<script>';
    echo "alert('Payment successful!');";
    echo '</script>';
    header("Location: CartView.php");
    //echo 'Payment successful!';
} catch (Exception $e) {
    echo 'Payment failed: ' . $e->getMessage();
}

//$adapter = new IP_StripePaymentAdapter();
//$service = new IP_StripePaymentService($adapter);
//
////$adapter = new IP_StripePaymentAdapter(new IP_StripePaymentService());
////$service = new IP_StripePaymentService($adapter);
//$adapter->setApiKey(getenv('STRIPE_SECRET_KEY'));
//
//$paymentModule = new IP_PaymentModule($adapter);
//
//// Process a payment using the payment service
//$paymentResult = $paymentModule->processPayment($amount, $currency, $cardNumber, $expDate, $cvv);
//
//// Check if the payment was successful or not
//if ($paymentResult->getStatus() === 'success') {
//  // Payment was successful
//  // Redirect the user to a success page or display a success message
//  header('Location: Homepage.php');
//} else {
//  // Payment failed
//  // Redirect the user to an error page or display an error message
//  echo '<script>alert("Error !")</script>';
//}


