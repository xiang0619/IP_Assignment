<?php
require_once '../Shared/DesignPattern/AdminProductFacade.php';

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
$productDetails = $facade->retrieveProducts();

// Convert the data to XML format
$xml = new SimpleXMLElement('<products/>');

foreach ($productDetails as $productDetail){
    $productTypeName = $facade->retrieveProductTypeName($productDetail['productTypeID']);
    $product = $xml->addChild('product');
    $product->addChild('product_id', $productDetail['productID']);
    $product->addChild('product_name', $productDetail['name']);
    $product->addChild('product_type_id', $productTypeName['productTypeName']);
    $product->addChild('product_upload_date', $productDetail['uploadDate']);
    $product->addChild('product_quantity', $productDetail['quantity']);
    $product->addChild('product_status', $productDetail['status']);
    $product->addChild('product_price', $productDetail['unitPrice']);
    $product->addChild('product_updated_id', $productDetail['updatedID']);
    $product->addChild('product_updated_date', $productDetail['updatedDate']);
    $product->addChild('product_create_id', $productDetail['createID']);
    $product->addChild('product_created_date', $productDetail['createdDate']);
    $product->addChild('product_image', $productDetail['image']);
    $product->addChild('product_description', $productDetail['description']);
}
?>
