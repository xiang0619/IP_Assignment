<?php
//Author : Tham Jun Yuan

include_once '../config.php';
include_once '../Shared/Helper/EncryptionHelper.php'; 
//session_start();
    $z = new EncryptionHelper("Customer");
    
    //decrypt id 
    $customerID= $z->decrypt($_SESSION['customerID']);

    if($customerID==null){
        header("Location: ./CustomerLogin.php");
    }
    
//Retrieve date from payment table
//$sql = "SELECT t.productid, c.customerid, c.customerName, t.name, p.totalPayment, p.payment_status, p.paymentDate FROM payment p, product t, customer c where p.productID = t.productID AND p.customerID= '{$customerID}'";
$sql = "SELECT t.productID, c.customerID, c.customerName, t.name, p.totalPayment, p.payment_status, p.paymentDate
        FROM payment p
        JOIN product t ON p.productID = t.productID
        JOIN customer c ON p.customerID = c.customerID
        WHERE p.customerID = '{$customerID}'";
//$sql = "SELECT p.paymentDate, p.totalPayment, p.payment_status, c.customerName, pr.name
//FROM payment p
//JOIN customer c ON p.customer_id = c.customer_id
//JOIN product pr ON p.product_id = pr.product_id
//WHERE c.customer_id = '{$customerID}'";
//$sql = "SELECT c.cartid, c.customerid,c.type, p.productid,p.name,c.quantity,p.image,p.unitPrice  FROM cart c , product p where c.productID = p. productID AND customerID= '{$customerID}' AND c.status='pending'";
$result = $dbc->query($sql);

$xml = new SimpleXMLElement('<payments/>');
while ($row = $result->fetch_assoc()) {
    
    $payment = $xml->addChild('payment');
    $payment->addChild('payment_date', $row['paymentDate']);
    $payment->addChild('total_payment', $row['totalPayment']);
    $payment->addChild('payment_status', $row['payment_status']);
//    $payment->addChild('customerName', $row['customerName']);
    $payment->addChild('name', $row['name']);
    
    $customer = $payment->addChild('customer');
    $customer->addChild('customer_id', $row['customerID']);
    $customer->addChild('customer_name', $row['customerName']);
    
    $product = $payment->addChild('product');
    $product->addChild('product_id', $row['productID']);
    $product->addChild('product_name', $row['name']);

}

