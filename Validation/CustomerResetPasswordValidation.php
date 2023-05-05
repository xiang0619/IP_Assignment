<?php
include '../Shared/Database/CustomerDatabase.php';

$resetCode = isset($_GET['resetCode']) ? $_GET['resetCode'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

