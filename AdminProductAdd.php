<?php

$name = $_POST["name"];
$quantity = $_POST["quantity"];
$price = $_POST["unit_price"];
$description = $_POST["description"];
$category = $_POST["category"];

if (isset($_POST["status"])) {
  $status = $_POST["status"];
}else{
    $status = "Unavailable";
}
// Get the uploaded image file and move it to the project folder
$image = $_FILES["image"]['name'];
$target = "Shared/Image/" . basename($image);
move_uploaded_file($_FILES["image"]["tmp_name"], $target);
$date = date("Y-m-d");
$productTypeID = "T0001";

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name
$db = new PDO($dsn,$user,$password); //connect to MYSQL using PDO class
$pstmt = $db->prepare("INSERT INTO product(name,quantity,productTypeID,status, unitPrice, image, description, updatedDate, createdDate, uploadDate) VALUES (?,?,?,?,?,?,?,?,?,?)"); //prepare an Insert Into statement
//prepare statements are important feature of PDO which can help to prevent SQL injection attacks by separating SQL code from user input
$pstmt ->bindParam(1, $name, PDO::PARAM_STR);
$pstmt ->bindParam(2, $quantity, PDO::PARAM_STR);
$pstmt ->bindParam(3, $productTypeID, PDO::PARAM_STR);
$pstmt ->bindParam(4, $status, PDO::PARAM_STR);
$pstmt ->bindParam(5, $price, PDO::PARAM_STR);
$pstmt ->bindParam(6, $image, PDO::PARAM_STR);
$pstmt ->bindParam(7, $description, PDO::PARAM_STR);
$pstmt ->bindParam(8, $date, PDO::PARAM_STR);
$pstmt ->bindParam(9, $date, PDO::PARAM_STR);
$pstmt ->bindParam(10, $date, PDO::PARAM_STR);
$pstmt ->execute();

header("Location: AdminProduct.php");
exit();


