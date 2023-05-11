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
        <title>Customer Forget Password</title>
    </head>
    <body>
        <?php
        include './Shared/PHP/CustomerHeader.php';
        include './Shared/DesignPattern/CustomerFactoryMethod.php';
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'ip';

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        
        $isValid = true;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];

            $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                $emailError = 'This email does not exist.';
                $isValid = false;
            }

            if (empty($email)) {
                $emailError = 'Please fill in your email address.';
                $isValid = false;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = 'Invalid email address.';
                $isValid = false;
            }

            if ($isValid == true) {
                $forgetPassword = AuthenticationFactory::createAuthentication("forgetPassword", $email, null, null, null,null);
                $forgetPassword->authenticate();
            }
        }
        ?>
        <div class="row m-5 d-flex justify-content-center">
            <div class="col-3"></div>
            <div class="col-6 text-left shadow-lg">
                <form method="POST">
                    <div class="row ">

                        <div class="col-12 fs-3 primary-color mt-4 mb-2">Forget Password</div>
                        <div class="col-12 primary-color mt-2 mb-2"><label for="email">Enter your email and we'll send you a link to reset your password.</label></div>

                        <div class="col-12 mt-2 mb-2"><input name="email" type="email" class="form-control" id="email" placeholder="Enter your email" maxlength="40" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"></div>

                        <div class="col-12 text-danger text-left mt-2 mb-2">
                            <?php
                            if (isset($emailError)) {
                                echo $emailError;
                            }
                            ?>
                        </div>
                        <!--Submit button position  -->              
                        <div class="col-12 mt-2 mb-2"><input type="Submit" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE" value="Forget Password"></div>
                        <div class="col-5 mt-2 mb-4"></div>
                        <div class="col-3 mt-2 mb-4"><a href="CustomerLogin.php">< Back to Login</a></div>   
                        <div class="col-4 mt-2 mb-4"></div>
                    </div>
                </form>

            </div>
            <div class="col-3"></div>
        </div>    
        <?php
        include './Shared/PHP/CustomerFooter.php';
        ?>
    </body>
</html>
