<?php
require '../Shared/Database/CustomerDatabase.php';

if(isset($_POST['submit'])){
    //到时候就是从session那边那data
    //todo: Ng Wen Xiang get id from session            
    $customerDatabase = new CustomerDatabase();
    $encryptionHelper = new EncryptionHelper("Customer");
    $customer = $customerDatabase->getProfile("YC+rP86LEkvnSmbNZnPq0rG2o2ndUe5V3iSkBQ1Gvd8=");
    
    $oldPassword = isset($_POST['oldPass']) && !empty($_POST['oldPass']) ? $_POST['oldPass'] : null;
    $newPassword = isset($_POST['newPass']) && !empty($_POST['newPass']) ? $_POST['newPass'] : null;
    $rePassword = isset($_POST['rePass']) && !empty($_POST['rePass']) ? $_POST['rePass'] : null;
    
    if($oldPassword == null){
        
        echo '<script>';
        echo 'alert("Please enter old password!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/ChangePassword.php";';
        echo '</script>';
        exit();
    }
    
    if($newPassword == null){
        
        echo '<script>';
        echo 'alert("Please enter new password!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/ChangePassword.php";';
        echo '</script>';
        exit();
    }
    
    if($rePassword == null){
        
        echo '<script>';
        echo 'alert("Please enter confirm password!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/ChangePassword.php";';
        echo '</script>';
        exit();
    }
    
    if($oldPassword != $encryptionHelper->decrypt($customer->getPassword())){
        echo '<script>';
        echo 'alert("Invalid old password!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/ChangePassword.php";';
        echo '</script>';
        exit();
    }
    
    if($newPassword != $rePassword){
        echo '<script>';
        echo 'alert("New Password and Confirm Password are not same!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/ChangePassword.php";';
        echo '</script>';
        exit();
    }
    
    if($oldPassword == $encryptionHelper->decrypt($customer->getPassword()) 
            && $newPassword == $rePassword){
        
        $customerDatabase->updatePassword($customer->getId(), $newPassword);
        echo '<script>';
        echo 'alert("New Password Updated.");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/Profile.php";';
        echo '</script>';
        exit();
    }
}