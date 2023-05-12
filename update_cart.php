<?php
$id= $_GET['id'];
$qty = $_GET['qty'];

include 'config.php';
$stmt = $dbc->prepare("UPDATE cart SET quantity = ? WHERE cartID = ?");
 $stmt->bind_param('is', $qty,$id );
$stmt->execute(); // execute bind 



?>
