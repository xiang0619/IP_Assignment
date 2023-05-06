<?php

include 'AdminProductFacade.php';

$name = $_POST["name"];
$quantity = $_POST["quantity"];
$unitPrice = $_POST["unit_price"];
$description = $_POST["description"];
$category = $_POST["category"];
$status = "Available";

// Get the uploaded image file and move it to the project folder
$image = $_FILES["image"]['name'];
$target = "Shared/Image/" . basename($image);
move_uploaded_file($_FILES["image"]["tmp_name"], $target);
$date = date("Y-m-d");
$productTypeID = "1";
$createID = "1";
$updatedID = "1";

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name

$pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
$facade = new AdminProductFacade($pdo);
$facade->addProduct($name,$date,$quantity,$status,$unitPrice,$updatedID,$date,$createID,$date,$image,$description, $productTypeID);

