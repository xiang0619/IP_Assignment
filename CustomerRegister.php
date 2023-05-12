<!DOCTYPE html>
<!--Author: Jason Lee Kar Chun -->
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Register</title>
    </head>
    <body>
        <?php
        include './Shared/PHP/CustomerHeader.php';
        include './Shared/DesignPattern/CustomerFactoryMethod.php';

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
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

            if ($customerEmailResult->num_rows > 0) {
                $emailError = "Email already exists, please choose a different one.";
                $isValid = false;
            }
            if ($customerPhoneResult->num_rows > 0) {
                $phoneError = "Mobile number already exists, please choose a different one.";
                $isValid = false;
            }
            if ($staffEmailResult->num_rows > 0) {
                $emailError = "Email already exists, please choose a different one.";
                $isValid = false;
            }
            if ($staffPhoneResult->num_rows > 0) {
                $phoneError = "Mobile number already exists, please choose a different one.";
                $isValid = false;
            }

            if (empty($email)) {
                $emailError = 'Please fill in your email address.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = 'Invalid email address.';
                $isValid = false;
            }

            if (empty($name)) {
                $nameError = 'Please fill in your name.';
                $isValid = false;
            }

            if (empty($password)) {
                $passwordError = 'Please fill in your password.';
                $isValid = false;
            } else if (strlen($password) < 8) {
                $passwordError = 'Password should be at least 8 characters long.';
                $isValid = false;
            } else if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/', $password)) {
                $passwordError = "The password must contain a combination of letters, numbers, and special characters such as !@#$%^&*()_+-=[]{}|;':\",./<>?";
                $isValid = false;
            }

            if (empty($confirmPassword)) {
                $confirmPasswordError = 'Please fill in your confirm password.';
                $isValid = false;
            } else if ($confirmPassword != $password) {
                $confirmPasswordError = 'Confirm password is not same with password.';
                $isValid = false;
            }

            if (empty($phone)) {
                $phoneError = 'Please fill in your mobile number.';
                $isValid = false;
            } else if (!preg_match($pattern, $phone)) {
                $phoneError = 'Please fill in a valid phone number format, such as: xxx-xxxxxxxx';
                $isValid = false;
            }

            if ($isValid == true) {
                mysqli_close($conn);
                $register = AuthenticationFactory::createAuthentication("register", $email, $name, $phone, $password, null);
                $register->authenticate();
            }
        }
        ?>

        <div class="row m-5">

            <!-- Make div to center -->
            <div class="col-2"></div>

            <!-- register form position -->
            <div class="col-8  shadow-lg">
                <form method="POST">

                    <div class="row">
                        <!-- Email input position-->

                        <!-- Login word position -->
                        <div class="col-12 fs-3 primary-color m-2 text-center">Register</div>

                        <!-- Icon position -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people-fill primary-color col-12 m-0" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>

                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="email">Email : </label></div>
                        <div class="col-6 mt-2 mb-2"><input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" maxlength="40" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"></div>
                        <div class="col-1"></div>

                        <div class="col-5 primary-color mt-2 mb-2"></div>
                        <div class="col-7 text-danger text-left mt-2 mb-2">
                            <?php
                            if (isset($emailError)) {
                                echo $emailError;
                            }
                            ?>
                        </div>

                        <!-- Name input position-->
                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="name">Name : </label></div>
                        <div class="col-6 mt-2 mb-2"><input class="form-control" type="text" name="name" id="name" placeholder="Enter your name" maxlength="40" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"></div>
                        <div class="col-1"></div>

                        <div class="col-5 primary-color mt-2 mb-2"></div>
                        <div class="col-7 text-danger text-left mt-2 mb-2">
                            <?php
                            if (isset($nameError)) {
                                echo $nameError;
                            }
                            ?>
                        </div>

                        <!-- Mobile input position -->
                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="mobile">Mobile Number : </label></div>
                        <div class="col-6 mt-2 mb-2"><input class="form-control" width="100" name="phone" type="text" id="mobile" placeholder="Enter your mobile number" maxlength="25" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"></div>
                        <div class="col-1"></div>

                        <div class="col-5 primary-color mt-2 mb-2"></div>
                        <div class="col-7 text-danger text-left mt-2 mb-2">
                            <?php
                            if (isset($phoneError)) {
                                echo $phoneError;
                            }
                            ?>
                        </div>

                        <!-- Password input position -->
                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="password">Password : </label></div>         
                        <div class="col-6 mt-2 mb-2">
                            <div class="input-group">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password" maxlength="40" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="showPassword()">
                                        <i class="fa fa-eye"  id="togglePassword" style="height: 22px"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>

                        <div class="col-5 primary-color mt-2 mb-2"></div>
                        <div class="col-7 text-danger text-left mt-2 mb-2">
                            <?php
                            if (isset($passwordError)) {
                                echo $passwordError;
                            }
                            ?>
                        </div>

                        <!-- Re-Password input position -->
                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="re-password">Confirm Password : </label></div>
                        <div class="col-6 mt-2 mb-2">
                            <div class="input-group">
                                <input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="Enter your password" maxlength="40" value="<?php echo isset($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : ''; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="showConfirmPassword()">
                                        <i class="fa fa-eye"  id="toggleConfirmPassword" style="height: 22px"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>

                        <div class="col-5 primary-color mt-2 mb-2"></div>
                        <div class="col-7 text-danger text-left mt-2 mb-2">
                            <?php
                            if (isset($confirmPasswordError)) {
                                echo $confirmPasswordError;
                            }
                            ?>
                        </div>

                        <!--Submit button position  -->
                        <div class="col-1 mt-2 mb-2 "></div>
                        <div class="col-10 mt-2 mb-2 "><input class="form-control" type="Submit" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Register"></div>
                        <div class="col-1 mt-2 mb-2 "></div>

                        <!-- Customer login link position -->
                        <div class="col-4 mt-2 mb-4"></div>
                        <div class="col-4 mt-2 mb-4"><a href="CustomerLogin.php">Already have an account? Login now.</a></div>   
                        <div class="col-4 mt-2 mb-4"></div>
                    </div>

                </form>
            </div>

            <!-- Make div to center -->
            <div class="col-2"></div>
        </div>

        <script>
            function showPassword() {
                var passwordField = document.getElementById("password");
                var toggleIcon = document.getElementById("togglePassword");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    toggleIcon.classList.remove("fa-eye");
                    toggleIcon.classList.add("fa-eye-slash");
                } else {
                    passwordField.type = "password";
                    toggleIcon.classList.remove("fa-eye-slash");
                    toggleIcon.classList.add("fa-eye");
                }
            }

            function showConfirmPassword() {
                var passwordField = document.getElementById("confirmPassword");
                var toggleIcon = document.getElementById("toggleConfirmPassword");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    toggleIcon.classList.remove("fa-eye");
                    toggleIcon.classList.add("fa-eye-slash");
                } else {
                    passwordField.type = "password";
                    toggleIcon.classList.remove("fa-eye-slash");
                    toggleIcon.classList.add("fa-eye");
                }
            }
        </script>

        <?php
        include './Shared/PHP/CustomerFooter.php';
        ?>
    </body>
</html>
