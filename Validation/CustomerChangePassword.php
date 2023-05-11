<?php
require '../Shared/Database/CustomerDatabase.php';

if(isset($_POST['submit'])){
    session_start();
    
    $customerID = $_SESSION['customerID'];

    $customerDatabase = new CustomerDatabase();
    $customer = $customerDatabase->getProfile($customerID);
    $encryptionHelper = new EncryptionHelper("Customer");
    
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
    }else if (strlen($newPpassword) < 8){
        echo '<script>';
        echo 'alert("Password should be at least 8 characters long.");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/ChangePassword.php";';
        echo '</script>';
        exit();
    }else if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/', $newPassword)) {
        echo '<script>';
        echo 'alert("The password must contain a combination of letters, numbers, and special characters such as !@#$%^&*()_+-=[]{}|;");';
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
    
    if(!password_verify($oldPassword, $customer->getPassword())){
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
    
    if(password_verify($oldPassword, $customer->getPassword()) 
            && $newPassword == $rePassword){
        
        $customerDatabase->updatePassword($customer->getId(), $newPassword);
        echo '<script>';
        echo 'alert("New Password Updated.");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/Profile.php";';
        echo '</script>';
        exit();
    }
}