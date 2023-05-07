<?php
$id = $_GET['id'];

include 'config.php';
$stmt = $dbc->prepare("delete from cart where cartid ='{$id}' ");
$stmt->execute(); //execute bind 


include 'CartView.php';
header("Location: CartView.php");
?>

