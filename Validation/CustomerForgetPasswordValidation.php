<?php

include '../Shared/Database/CustomerDatabase.php';

$email = isset($_POST['email']) ? $_POST['email'] : null;

if($email != null){
    $customerDatabase = new CustomerDatabase();
    $sendingEmail = $customerDatabase->resetCustomerPassword($email);
    if($sendingEmail){
        echo "<script>";
        echo "alert(\"Reset Password Email Sended\");";
        echo "</script>";
    }else{
        echo 'false';
    }
}