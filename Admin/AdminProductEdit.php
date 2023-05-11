<?php

include '../Shared/DesignPattern/AdminProductFacade.php';

$productID = $_POST["productID"];
$name = $_POST["name"];
$quantity = $_POST["quantity"];
$unitPrice = $_POST["unit_price"];
$description = $_POST["description"];
$productTypeName = $_POST["category"];
$status = $_POST["status"];

if (!empty($_FILES['image']['name'])) {
    // Get the uploaded image file and move it to the project folder
    $image = $_FILES["image"]['name'];
    $target = "../Shared/Image/" . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target);
} else {
    $image = $_POST["image_default"];
}

$uploadDate = $_POST["uploadDate"];
$updatedDate = date("Y-m-d");
$createdDate = $_POST["createdDate"];
$createID = $_POST["createID"];
$updatedID = $_POST["updatedID"];

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname";

$pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
$facade = new AdminProductFacade($pdo);
$productTypeID = $facade->retrieveProductTypeID($productTypeName);
$facade->editProduct($productID,$name,$uploadDate,$quantity,$status,$unitPrice,$updatedID,$updatedDate,$createID,$createdDate,$image,$description, $productTypeID['productTypeID']);

?>