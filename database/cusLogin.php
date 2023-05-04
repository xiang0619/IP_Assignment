<style>
    
</style>

<?php
session_start();
include('../includes/config.php');
//login 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['email'];
    $userPass = $_POST['pass']; //double encrypt to increase security sha1(md5())
    
    $stmt = $dbc->prepare("SELECT email_address, password, people_id  FROM  people WHERE (email_address = ? AND password = ?)"); //sql to log in user
    $stmt->bind_param('ss',  $userEmail, $userPass); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($custEmail, $custPass, $peopleID); //bind result
    $rs = $stmt->fetch();
   
    if ($rs) {
         $_SESSION['peopleID'] = $peopleID;
        echo '<script>alert("Login successful!");</script>';
        header("location:homepage.php");
    } else {
        echo '<script>alert("Incorrect email or password");</script>';
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Member Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/cusLog.css">
<!--===============================================================================================-->
    </head>
    <body>
        <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                                <div>
                                    <a class="logBack" href="homepage.php"><strong><</strong> Back</a>
				</div>
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-ftb.png" alt="IMG">
				</div>

                            <form method="POST" class="login100-form validate-form" action="cusLogin.php">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" id="password" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-key" aria-hidden="true"></i>
						</span>
					</div>
					<input type="checkbox" id="show-password-checkbox"> Show Password
					<div class="container-login100-form-btn">
                                            <!--<button class="login100-form-btn" onclick="location.href='https://google.com';">-->
							<input name="btnLogin" class="login100-form-btn" type="submit" value="Login"/>
						<!--</button>-->
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="cusReset1.php">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="cusRegis.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
                
                const passwordInput = document.getElementById("password");
  const showPasswordCheckbox = document.getElementById("show-password-checkbox");
  
  showPasswordCheckbox.addEventListener("change", () => {
    if (showPasswordCheckbox.checked) {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  });
	</script>
<!--===============================================================================================-->
	<script src="../js/cusLog.js"></script>
    </body>
</html>
