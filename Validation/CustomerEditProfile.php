<?php

require '../Shared/Database/CustomerDatabase.php';

if(isset($_POST['submit'])){
    session_start();
    
    $customerID = $_SESSION['customerID'];

    $customerDatabase = new CustomerDatabase();
    $customer = $customerDatabase->getProfile($customerID);
    $encryptionHelper = new EncryptionHelper("Customer");
    
    $name = isset($_POST['name']) && !empty($_POST['name']) ? $_POST['name'] : null;
    $mobile = isset($_POST['mobile']) && !empty($_POST['mobile']) ? $_POST['mobile'] : null;
    
    if($name == null){
        
        echo '<script>';
        echo 'alert("Please enter name!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/EditProfile.php";';
        echo '</script>';
        exit();
    }
    
    if($mobile == null){
        
        echo '<script>';
        echo 'alert("Please mobile number!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/EditProfile.php";';
        echo '</script>';
        exit();
    }
    
    if($name != null && $mobile != null){
        
        $customer->setName($name);
        $customer->setMobile($mobile);
        
        $customerDatabase->updateProfile($customer);
        
        echo '<script>';
        echo 'alert("Profile Updated.");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/Profile.php";';
        echo '</script>';
        exit();
    }
}
