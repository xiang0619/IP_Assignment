<?php

/**
 * Description of ProductAdmin
 *
 * @author Chin Kah Seng
 */

include '../Shared/DesignPattern/AdminProductFacade.php';

$productTypeOldName = $_POST["category"];
$productTypeNewName = $_POST["productTypeName"];

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name

$pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
$facade = new AdminProductFacade($pdo);
$facade->editProductType($productTypeOldName, $productTypeNewName);

