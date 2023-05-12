<!-- @author: Tham Jun Yuan --> 
<?php

//// Replace the variables with your database credentials
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "ip";
//
//// Create a connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
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

//$payID = $_SESSION['customerID'];

$stmt = $dbc->prepare("SELECT * FROM payment WHERE customerID = ?");
$stmt->bind_param('i', $customerID);
$stmt->execute();
$result = $stmt->get_result();
$payment = $result->fetch_assoc();
$stmt->close();

// Create the root element
$xml = new SimpleXMLElement('<paymentReceipt/>');

// Add child elements to the root element using the $payment variable
$paymentNode = $xml->addChild('payment');
$paymentNode->addChild('paymentID', $payment['paymentID']);
$paymentNode->addChild('customerID', $payment['customerID']);
$paymentNode->addChild('paymentMethod', $payment['paymentMethod']);
$paymentNode->addChild('paymentDate', $payment['paymentDate']);
$paymentNode->addChild('productID', $payment['productID']);
$paymentNode->addChild('totalPayment', $payment['totalPayment']);
$paymentNode->addChild('payment_status', $payment['payment_status']);


// Close the database connection 


