<?php
$id= $_GET['id'];
$qty = $_GET['qty'];

include 'config.php';
$stmt = $dbc->prepare("UPDATE cart SET quantity = '{$qty}' WHERE cartID = '{$id}'");
$stmt->execute(); // execute bind 



?>
