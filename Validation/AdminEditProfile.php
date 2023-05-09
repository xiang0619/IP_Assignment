<?php

require '../Shared/Database/StaffDatabase.php';

if(isset($_POST['submit'])){
    
    //到时候就是从session那边那data
    //todo: Ng Wen Xiang get id from session            
    $staffDatabase = new StaffDatabase();
    $encryptionHelper = new EncryptionHelper("Staff");
    $staff = $staffDatabase->getProfile("jcyMiBKoHb1EYUTrTg+QdsFySTEE0EjVFf+ae5stzQA=");
    
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
