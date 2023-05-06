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
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Convert the data to XML format
$xml = new SimpleXMLElement('<products/>');
while ($row = $result->fetch_assoc()) {
    $product = $xml->addChild('product');
    $product->addChild('product_id', $row['productID']);
    $product->addChild('product_name', $row['name']);
    $product->addChild('product_type_id', $row['productTypeID']);
    $product->addChild('product_upload_date', $row['uploadDate']);
    $product->addChild('product_quantity', $row['quantity']);
    $product->addChild('product_status', $row['status']);
    $product->addChild('product_price', $row['unitPrice']);
    $product->addChild('product_updated_id', $row['updatedID']);
    $product->addChild('product_updated_date', $row['updatedDate']);
    $product->addChild('product_create_id', $row['createID']);
    $product->addChild('product_created_date', $row['createdDate']);
    $product->addChild('product_image', $row['image']);
    $product->addChild('product_description', $row['description']);
}

// Close the database connection 
$conn->close();
?>
