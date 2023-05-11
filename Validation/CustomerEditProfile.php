<?php

require '../Shared/Database/CustomerDatabase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $customerID = $_SESSION['customerID'];

    $customerDatabase = new CustomerDatabase();
    $customer = $customerDatabase->getProfile($customerID);
    $encryptionHelper = new EncryptionHelper("Customer");

    $name = isset($_GET['name']) && !empty($_GET['name']) ? $_GET['name'] : null;
    $mobile = isset($_GET['mobile']) && !empty($_GET['mobile']) ? $_GET['mobile'] : null;

    echo $name,$mobile;
    
    if ($name == null || $mobile == null) {
        response(400, "Invalid Request", NULL);
        exit();
    } else if (!preg_match("/^01[0-46-9]-\d{7,8}$/ ", $mobile)) {
        response(400, "Invalid Mobile Number", NULL);
        exit();
    } else {
        $customer->setName($name);
        $customer->setMobile($mobile);

        $customerDatabase->updateProfile($customer);

        response(200, "Profile Updated", NULL);
        exit();
    }
}

response(400, "Invalid Request", NULL);

function response($status, $message, $data) {
    header("Content-Type: application/json");
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['message'] = $message;
    $response['data'] = $data;
    $json_response = json_encode($response);
    echo $json_response;
}
