<?php
/*Author : Ng Wen Xiang*/
header('Content-Type: application/json');
session_start();
require '../../Shared/Database/CustomerDatabase.php';

$customerID = $_SESSION['customerID'];

$customerDatabase = new CustomerDatabase();
$customer = $customerDatabase->getProfile($customerID);
$encryptionHelper = new EncryptionHelper("Customer");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : null;
    
    if ($name == null || $mobile == null) {
        response(400, "Please fill in name and phone number", NULL);
        exit();
    }else if (!preg_match("/^01[0-46-9]-\d{7,8}$/", $mobile)) {
        response(400, "Invalid Mobile Number", NULL);
        exit();
    } else {
        $customer->setName($name);
        $customer->setMobile($mobile);

        $customerDatabase->updateProfile($customer);

        response(200, "Profile Updated", NULL);
        exit();
    }
} else {
    response(400, "Invalid Request", NULL);
}

function response($status, $message, $data) {
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['message'] = $message;
    $response['data'] = $data;
    $json_response = json_encode($response);
    
    echo $json_response;
}
?>
