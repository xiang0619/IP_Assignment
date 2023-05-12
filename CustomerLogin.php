<!DOCTYPE html>
<!--Author: Jason Lee Kar Chun -->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Customer Login</title>
    </head>
    <body>
        <?php
        include './Shared/PHP/CustomerHeader.php';
        include './Shared/DesignPattern/CustomerFactoryMethod.php';
        $isValid = true;

//        $servername = 'localhost';
//        $username = 'root';
//        $password = '';
//        $dbname = 'ip';
//        
//        // Create connection
//        $conn = mysqli_connect($servername, $username, $password, $dbname);
//
//        // Check connection
//        if (!$conn) {
//            die("Connection failed: " . mysqli_connect_error());
//        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email)) {
                $emailError = 'Please fill in your email address.';
                $isValid = false;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = 'Invalid email address.';
                $isValid = false;
            }


            if (empty($password)) {
                $passwordError = 'Please fill in your password.';
                $isValid = false;
            }

            if ($isValid == true) {
                $login = AuthenticationFactory::createAuthentication("login", $email, null, null, $password, null);
                $login->authenticate();
            }
        }
        ?>
        <div class="row m-5 d-flex justify-content-center">
            <div class="col-3"></div>
            <div class="col-6 text-center shadow-lg">
                <form method="POST">
                    <div class="row ">

                        <!-- Login word position -->
                        <div class="col-12 fs-3 primary-color m-2">Login</div>

                        <!-- Icon position -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people-fill primary-color col-12 m-0" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>

                        <!-- Email input position-->
                        <div class="col-4 primary-color mt-2 mb-2"><label for="email">Email : </label></div>
                        <div class="col-8 mt-2 mb-2"><input name="email" type="email" class="form-control" id="email" placeholder="Enter your email" maxlength="40" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"></div>

                        <div class="col-12 text-danger text-left mt-2 mb-2">
                            <?php
                            if (isset($emailError)) {
                                echo $emailError;
                            }
                            ?>
                        </div>

                        <!-- Password input position -->
                        <div class="col-4 primary-color mt-2 mb-2"><label for="password">Password : </label></div>

                        <div class="col-8 mt-2 mb-2">
                            <div class="input-group">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password" maxlength="40" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="showPassword()">
                                        <i class="fa fa-eye"  id="togglePassword" style="height: 22px"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-danger text-left mt-2 mb-2">
                            <?php
                            if (isset($passwordError)) {
                                echo $passwordError;
                            }
                            ?>
                        </div>
                        <!-- Customer forget password link position -->             
                        <div class="col-9 mt-2 mb-2"></div>
                        <div class="col-3 mt-2 mb-2"><a href="CustomerForgetPassword.php">Forgot Password?</a></div>

                        <div class="col-1 mt-2 mb-2 "></div>
                        <!--Submit button position  -->              
                        <div class="col-11 mt-2 mb-2 "><input type="Submit" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE" value="Login"></div>

                        <!-- Customer register link position -->
                        <div class="col-4 mt-2 mb-4"></div>
                        <div class="col-5 mt-2 mb-4"><a href="CustomerRegister.php">Don't have an account?</a></div>
                        <div class="col-3 mt-2 mb-4"></div>

                    </div>
                </form>

            </div>
            <div class="col-3"></div>
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
    </script>
</html>
