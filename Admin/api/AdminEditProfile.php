<?php
/*Author : Ng Wen Xiang*/
header('Content-Type: application/json');
session_start();
require '../../Shared/Database/StaffDatabase.php';

$staffID = $_SESSION['staffID'];

$staffDatabase = new StaffDatabase();
$staff = $staffDatabase->getProfile($staffID);
$encryptionHelper = new EncryptionHelper("Staff");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : null;
    
    if ($name == null || $mobile == null) {
        response(400, "Please fill in name and phone number", NULL);
        exit();
    }else if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/', $newPassword)) {
        response(400, "Invalid phone number", NULL);
        exit();
    } else {
        $staff->setName($name);
        $staff->setMobile($mobile);

        $staffDatabase->updateProfile($staff);

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
