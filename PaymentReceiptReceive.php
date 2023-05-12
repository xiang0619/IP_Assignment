<?php

// Replace the variables with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ip";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Customer details
//Payment details
//Order details -> Product details

$sql = "SELECT c.customerName, c.email, p.paymentID, p.paymentDate, p.totalPayment, ct.cartID, ct.status, ct.productID, ct.serviceID, ct.type, ct.quantity, ct.file, ct.downloadStatus
FROM Customer c
INNER JOIN Payment p ON c.customerID = p.customerID
INNER JOIN Cart ct ON c.customerID = ct.customerID
WHERE ct.status = 'Completed' AND p.paymentID = 'payment_id_here'";
$result = $conn->query($sql);

// Convert the data to XML format
$xml = "<?xml version='1.0' encoding='UTF-8'?>";
$xml .= "<orders>";

//if ($result->num_rows > 0) {
//  while($row = $result->fetch_assoc()) {
//    $xml .= "<order>";
//    $xml .= "<id>" . $row["id"] . "</id>";
//    $xml .= "<customer_name>" . $row["customer_name"] . "</customer_name>";
//    $xml .= "<order_date>" . $row["order_date"] . "</order_date>";
//    $xml .= "<total_amount>" . $row["total_amount"] . "</total_amount>";
//    $xml .= "</order>";
//  }
//}

$xml .= "</orders>";

// Create the root element
$xml = new SimpleXMLElement('<paymentReceipt/>');

// Loop through the result set and add child elements to the root element
while ($row = $result->fetch_assoc()) {
    $order = $xml->addChild('order');
    $order->addChild('order_id', $row['order_id']);
    $order->addChild('customer_id', $row['customer_id']);
    $order->addChild('paymentDate', $row['paymentDate']);

    $customer = $order->addChild('customer');
    $customer->addChild('name', $row['name']);
    $customer->addChild('email', $row['email']);
    $customer->addChild('phone', $row['phone']);

    $payment = $order->addChild('payment');
    $payment->addChild('payment_id', $row['payment_id']);
    $payment->addChild('payment_date', $row['payment_date']);
    $payment->addChild('amount', $row['amount']);
}



// Close the database connection 
$conn->close();

