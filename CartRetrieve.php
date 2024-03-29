<!--Author: ONG ENG HUAT-->
<?php
include 'config.php';
include './Shared/Helper/EncryptionHelper.php'; 
session_start();
    $z = new EncryptionHelper("Customer");
    
    //decrypt id 
    $customerID= $z->decrypt($_SESSION['customerID']);

    if($customerID==null){
        header("Location: ./CustomerLogin.php");
    }

// Get the data from the database
$sql = "SELECT c.cartid, c.customerid,c.type, p.productid,p.name,c.quantity,p.image,p.unitPrice  FROM cart c , product p where c.productID = p. productID AND customerID= '{$customerID}' AND c.status='pending'";
$result = $dbc->query($sql);


// Convert the data to XML format
$xml = new SimpleXMLElement('<products/>');
while ($row = $result->fetch_assoc()) {
    
    $product = $xml->addChild('product');
    $product->addChild('cart_id', $row['cartid']);
    $product->addChild('customerid', $row['customerid']);
    $product->addChild('type', $row['type']);
    $product->addChild('productID', $row['productid']);
    $product->addChild('name', $row['name']);
    $product->addChild('quantity', $row['quantity']);
    $product->addChild("productImage", $row['image']);
    $product->addChild("productPrice", $row['unitPrice']);
    $qty=$row['quantity'];
    $price=$row['unitPrice'];
    $total=$qty *$price;
    $product->addChild("total", $total);

}

$sql = "SELECT c.cartid, c.customerid,c.type,c.quantity, s.serviceID, s.pricePerPage,c.file FROM cart c , service s where c.serviceID = s.serviceID AND customerID= '{$customerID}' AND c.status='pending'";
$result = $dbc->query($sql);
while ($row = $result->fetch_assoc()) {
    
    $product = $xml->addChild('product');
    $product->addChild('cart_id', $row['cartid']);
    $product->addChild('customerid', $row['customerid']);
    $product->addChild('type', $row['type']);
    
    $product->addChild('productID', $row['serviceID']);
    $product->addChild('name', $row['file']);
    $product->addChild('quantity', $row['quantity']);
    $product->addChild("productImage", "pdf.png");
    $product->addChild("productPrice", $row['pricePerPage']);
    $qty=$row['quantity'];
    $price=$row['pricePerPage'];
    $total=$qty *$price;
    $product->addChild("total", $total);
    

}
// Close the database connection 
$dbc->close();
?>

