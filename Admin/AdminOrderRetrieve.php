<?php
require_once '../Shared/DesignPattern/AdminProductFacade.php';
require_once '../Shared/DesignPattern/AdminServiceFacade.php';

/**
 * @author Chin Kah Seng
 */

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name

$pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
$facade = new AdminProductFacade($pdo);
$facadeS = new AdminServiceFacade($pdo);
$orderDetails = $facade->retrieveAllOrders();

// Convert the data to XML format
$xml = new SimpleXMLElement('<orders/>');

foreach ($orderDetails as $orderDetail){
    $customerName = $facadeS->retrieveCustomerName($orderDetail['customerID']);
    $order = $xml->addChild('order');
    $order->addChild('paymentID', $orderDetail['paymentID']);
    $order->addChild('customerID', $orderDetail['customerID']);
    $order->addChild('paymentMethod', $orderDetail['paymentMethod']);
    $order->addChild('totalPayment', $orderDetail['totalPayment']);
    $order->addChild('orderID', $orderDetail['paymentID']);
    $order->addChild('customerName', $customerName['customerName']);    
}
?>
