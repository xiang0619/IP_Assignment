<?php
include 'config.php';

// Get the data from the database
$sql = "SELECT c.cartid, c.customerid, p.productid,p.name,c.quantity,p.image  FROM cart c , product p where c.productID = p. productID";
$result = $dbc->query($sql);
$count=0;

// Convert the data to XML format
$xml = new SimpleXMLElement('<products/>');
while ($row = $result->fetch_assoc()) {
    $count=$count+1;
    $product = $xml->addChild('product');
    $product->addChild('cart_id', $row['cartid']);
    $product->addChild('customerid', $row['customerid']);
    $product->addChild('productID', $row['productid']);
    $product->addChild('name', $row['name']);
    $product->addChild('quantity', $row['quantity']);
    $product->addChild("count", $count);
    $product->addChild("productImage", $row['image']);
        
}

// Close the database connection 
$dbc->close();
?>

