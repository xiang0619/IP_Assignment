<!DOCTYPE html>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Customer Reset Password</title>
    </head>
    <body>
        <?php
        include './Shared/PHP/CustomerHeader.php';
        include './Shared/DesignPattern/CustomerFactoryMethod.php';
        include './Shared/errorPage.php';
        $isValid = true;
        $id = $_GET['id'];

        $servername = 'localhost';
        $username = 'root';
        $serverpassword = '';
        $dbname = 'ip';

        // Create connection
        $conn = mysqli_connect($servername, $username, $serverpassword, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = $conn->prepare("SELECT * FROM customer WHERE resetCode = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result->num_rows == 0) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirmPassword'];

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

                if ($isValid == true) {
                    mysqli_close($conn);
                    $resetPassword = AuthenticationFactory::createAuthentication("resetPassword", null, null, null, $password, $id);
                    $resetPassword->authenticate();
                }
            }
        } else {
            trigger_error('An error occurred', E_USER_ERROR);
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
                        <div class="col-12 fs-3 primary-color m-2 text-center">Reset Password</div>

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
                        <div class="col-1 mt-2 mb-4 "></div>
                        <div class="col-10 mt-2 mb-4 "><input class="form-control" type="Submit" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Confirm"></div>
                        <div class="col-1 mt-2 mb-4 "></div>
                    </div>

                </form>
            </div>

            <!-- Make div to center -->
            <div class="col-2"></div>
        </div>   
        <?php
        include './Shared/PHP/CustomerFooter.php';
        ?>
    </body>
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
</html>
