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

// Get the data from the database
$sql = "SELECT * FROM staff WHERE position = 'normal staff'";
$result = $conn->query($sql);

// Convert the data to XML format
$xml = new SimpleXMLElement('<staffs/>');
while ($row = $result->fetch_assoc()) {
    $product = $xml->addChild('staff');
    $product->addChild('staff_id', $row['ID']);
    $product->addChild('staff_email', $row['email']);
    $product->addChild('staff_name', $row['name']);
    $product->addChild('staff_status', $row['status']);
    $product->addChild('staff_position', $row['position']);
    $product->addChild('staff_mobile', $row['mobile']);
    $product->addChild('staff_updateID', $row['updatedID']);
    $product->addChild('staff_updateDate', $row['updatedDate']);
    $product->addChild('staff_createID', $row['createdID']);
    $product->addChild('staff_createDate', $row['createdDate']);
}

// Close the database connection 
$conn->close();


