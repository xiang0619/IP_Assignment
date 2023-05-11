<?php

require '../Shared/Database/StaffDatabase.php';

if(isset($_POST['submit'])){
    session_start();
    
    $staffID = $_SESSION['staffID'];

    $staffDatabase = new StaffDatabase();
    $staff = $staffDatabase->getProfile($staffID);
    $encryptionHelper = new EncryptionHelper("Staff");
    
    $name = isset($_POST['name']) && !empty($_POST['name']) ? $_POST['name'] : null;
    $mobile = isset($_POST['mobile']) && !empty($_POST['mobile']) ? $_POST['mobile'] : null;
    
    print_r($staff);
    
    if($name == null){
        
        echo '<script>';
        echo 'alert("Please enter name!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Admin/AdminEditProfile.php";';
        echo '</script>';
        exit();
    }
    
    if($mobile == null){
        
        echo '<script>';
        echo 'alert("Please mobile number!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Admin/AdminEditProfile.php";';
        echo '</script>';
        exit();
    }else if (!preg_match("/^01[0-46-9]-\d{7,8}$/ ", $mobile)) {
        echo '<script>';
        echo 'alert("Please mobile valid number!!");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Customer/EditProfile.php";';
        echo '</script>';
        exit();
    }
    
    if($name != null && $mobile != null){
        
        $staff->setName($name);
        $staff->setMobile($mobile);
        
        $staffDatabase->updateProfile($staff);
        
        echo '<script>';
        echo 'alert("Profile Updated.");';
        echo 'window.location.href = "http://localhost/IP_Assignment/Admin/AdminProfile.php";';
        echo '</script>';
        exit();
    }
}
