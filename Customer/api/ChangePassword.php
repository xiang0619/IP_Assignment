<?php
/*Author : Ng Wen Xiang*/
?>
<?php
header('Content-Type: application/json');
session_start();
require '../../Shared/Database/CustomerDatabase.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $customer = $_SESSION['customerID'];

    $customerDatabase = new CustomerDatabase();
    $customer = $customerDatabase->getProfile($customer);
    
    $oldPassword = isset($_POST['oldPass']) && !empty($_POST['oldPass']) ? $_POST['oldPass'] : null;
    $newPassword = isset($_POST['newPass']) && !empty($_POST['newPass']) ? $_POST['newPass'] : null;
    $rePassword = isset($_POST['rePass']) && !empty($_POST['rePass']) ? $_POST['rePass'] : null;
    
    if($oldPassword == null){
        response(400, "Please enter old password!", null);
    }
    
    if($newPassword == null){
        response(400, "Please enter new password!", null);
    } else if (strlen($newPassword) < 8) {
        response(400, "Password should be at least 8 characters long.", null);
    } else if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/', $newPassword)) {
        response(400, "The password must contain a combination of letters, numbers, and special characters.", null);
    }
    
    if($rePassword == null){
        response(400, "Please enter confirm password!", null);
    }
    
    if(!password_verify($oldPassword, $customer->getPassword())){
        response(400, "Invalid old password!", null);
    }
    
    if($newPassword != $rePassword){
        response(400, "New Password and Confirm Password are not the same!", null);
    }
    
    if(password_verify($oldPassword, $customer->getPassword()) && $newPassword == $rePassword){
        $customerDayt->updatePassword($customer->getId(), $newPassword);
        response(200, "New Password Updated.", null);
    }
}

function response($status, $message, $data) {
    http_response_code($status);
    $response['status'] = $status;
    $response['message'] = $message;
    $response['data'] = $data;
    $json_response = json_encode($response);
    
    echo $json_response;
    exit();
}
?>