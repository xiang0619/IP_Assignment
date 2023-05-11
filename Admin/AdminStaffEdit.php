<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JE Admin</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2.10.3/dist/bundle.min.js"></script>
        <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            .dropdown:hover .dropdown-menu {
                display: block;
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                top: 100%;
            }
            body{
                background-color: white;
            }

            #adminStaff {
                color: lightsteelblue;
            }

            #adminStaff1 {
                color: white;
            }

            #adminService1, #adminReport1,#adminProduct1{
                color:white;
            }
        </style>
    </head>
    <body>
        <?php
        include '../Shared/DesignPattern/StaffFactoryMethod.php';
        include '../Shared/PHP/AdminHeader.php';
        include '../Shared/errorPage.php';

        $staffID = $_GET['id'];
        $servername = 'localhost';
        $username = 'root';
        $serverPassword = '';
        $dbname = 'ip';

// Create connection
        $conn = mysqli_connect($servername, $username, $serverPassword, $dbname);

// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $isValid = true;

        $stmt = $conn->prepare("SELECT * FROM staff WHERE ID = ?");
        $stmt->bind_param("s", $staffID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            trigger_error('An error occurred', E_USER_ERROR);
        }

        $staffStmt = $conn->prepare("SELECT * FROM staff WHERE ID = ?");
        $staffStmt->bind_param("s", $staffID);
        $staffStmt->execute();
        $staffResult = $staffStmt->get_result();
        $staff = $staffResult->fetch_assoc();

        $nameValue = $staff['name'];
        $emailValue = $staff['email'];
        $positionValue = $staff['position'];
        $statusValue = $staff['status'];
        $mobileValue = $staff['mobile'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $position = $_POST['position'];
            $status = $_POST['status'];
            $phone = $_POST['mobileNumber'];

            $pattern = "/^01[0-46-9]-\d{7,8}$/ "; // Regular expression pattern

            $customerEmailstmt = $conn->prepare("SELECT * FROM customer WHERE email = ?"); // prepare the statement
            $customerEmailstmt->bind_param("s", $email); // bind the parameters
            $customerEmailstmt->execute(); // execute the statement
            $customerEmailResult = $customerEmailstmt->get_result(); // get the result set

            $customerPhonestmt = $conn->prepare("SELECT * FROM customer WHERE mobile = ?");
            $customerPhonestmt->bind_param("s", $phone);
            $customerPhonestmt->execute();
            $customerPhoneResult = $customerPhonestmt->get_result();

            $staffEmailstmt = $conn->prepare("SELECT * FROM staff WHERE email = ?");
            $staffEmailstmt->bind_param("s", $email);
            $staffEmailstmt->execute();
            $staffEmailResult = $staffEmailstmt->get_result();

            $staffPhonestmt = $conn->prepare("SELECT * FROM staff WHERE mobile = ?");
            $staffPhonestmt->bind_param("s", $phone);
            $staffPhonestmt->execute();
            $staffPhoneResult = $staffPhonestmt->get_result();

            if ($email != $emailValue) {
                if ($customerEmailResult->num_rows > 0) {
                    $emailError = "Email already exists, please choose a different one.";
                    $isValid = false;
                } if ($staffEmailResult->num_rows > 0) {
                    $emailError = "Email already exists, please choose a different one.";
                    $isValid = false;
                }
            }

            if ($phone != $mobileValue) {
                if ($customerPhoneResult->num_rows > 0) {
                    $mobileNumberError = "Mobile number already exists, please choose a different one.";
                    $isValid = false;
                }

                if ($staffPhoneResult->num_rows > 0) {
                    $mobileNumberError = "Mobile number already exists, please choose a different one.";
                    $isValid = false;
                }
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = 'Invalid email address.';
                $isValid = false;
            }
            if (!preg_match($pattern, $phone)) {
                $mobileNumberError = 'Please fill in a valid phone number format, such as: xxx-xxxxxxxx';
                $isValid = false;
            }


            if ($isValid == true) {
                mysqli_close($conn);
                $editStaff = AuthenticationFactory::createAuthentication("editStaff", $staffID, $email, $name, $status, $position, $phone, null);
                $editStaff->authenticate();
            }
        }
        ?>
        <!-- Main Content Area -->
        <div>
            <main class="container-fluid mb-4 mt-4 text-center" style="">
                <h1>Staff</h1>
            </main>

            <main class="container mx-auto mt-5 mb-5" style="max-width: 600px;">
                <div class="card border rounded-3">
                    <div class="card-header text-center">
                        <h4>Edit Staff</h4>
                    </div>
                    <div class="card-body ms-1 me-1">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="item_name" class="form-label mt-2">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameValue; ?>" required>
                                <span id="nameError" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="item_name" class="form-label mt-2">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $emailValue; ?>" required>
                                <span id="emailError" class="text-danger">
                                    <?php
                                    if (isset($emailError)) {
                                        echo $emailError;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label mt-2">Position:</label>
                                <select class="form-control" id="position" name="position" required>
                                    <option value="">Select a position</option>                   
                                    <option value="senior staff" <?php if ($positionValue === 'senior staff') echo 'selected'; ?>>Senior staff</option> 
                                    <option value="normal staff" <?php if ($positionValue === 'normal staff') echo 'selected'; ?>>Normal staff</option> 
                                </select>
                                <span id="positionError" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label mt-2">Status:</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="">Select a status</option>                   
                                    <option value="employed" <?php if ($statusValue === 'employed') echo 'selected'; ?>>Employed</option> 
                                    <option value="resigned" <?php if ($statusValue === 'resigned') echo 'selected'; ?>>Resigned</option> 
                                </select>
                                <span id="statusError" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label for="item_name" class="form-label mt-2">Mobile Number:</label>
                                <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" value="<?php echo $mobileValue; ?>" required>
                                <span id="mobileNumberError" class="text-danger">
                                    <?php
                                    if (isset($mobileNumberError)) {
                                        echo $mobileNumberError;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="row mt-4">
                                <div class="col text-center">
                                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"  onclick="window.location.href = 'AdminStaff.php'">Cancel</button>
                                    <button type="submit" id="confirm" class="btn btn-primary" onclick="return validateAdminAddStaffForm()">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

        </div>
    </body>
</html>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>