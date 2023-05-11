<?php

require_once __DIR__ .  '/../../vendor/autoload.php';

// Abstract class for login and register
abstract class Authentication {

    protected $email;
    protected $name;
    protected $phone;
    protected $password;
    protected $resetCode;

    public function __construct($email="", $name="", $phone="", $password="",$resetCode="") {
        $this->email = $email;
        $this->name = $name;
        $this->phone = $phone;
        $this->password = $password;
        $this->resetCode = $resetCode;
    }

    abstract public function authenticate();
}

// Concrete class for login
class Login extends Authentication {

    public function authenticate() {
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
        // Code for customer login authentication
        $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $result = $stmt->get_result();
        $customer = $result->fetch_assoc();
        $hashedPassword = $customer['password'] ?? null;

        // User found, check if password is cor rect
        if (password_verify($this->password, $hashedPassword)) {
            // Set session variables
            
            $encryptionHelper = new EncryptionHelper("Customer");
            
            $encryptCustomerID = $encryptionHelper->encrypt($customer['customerID']);
            
            $_SESSION['customerID'] = $encryptCustomerID;

            // Redirect to the homepage
            echo '<script>window.location.href = "Homepage.php";</script>';
        }
        $stmt->close();

        // Code for staff login authentication
        $staffStmt = $conn->prepare("SELECT * FROM staff WHERE email = ?");
        $staffStmt->bind_param("s", $this->email);
        $staffStmt->execute();
        $staffResult = $staffStmt->get_result();
        $staff = $staffResult->fetch_assoc();
        
//        $staffHashedPassword = $staff['password']?? null;
        // User found, check if password is correct
//        if (password_verify($this->password, $staff['password'])) {
        if (password_verify($this->password, $hashedPassword)) {
            
            $encryptionHelper = new EncryptionHelper("Staff");
            
            $encryptStaffID = $encryptionHelper->encrypt($staff['id']);
            
            // Set session variables
            $_SESSION['staffID'] = $encryptStaffID;
            
            $_SESSION['position'] = $staff['position'];

            // Redirect to the homepage
            echo '<script>window.location.href = "AdminHome.php";</script>';
        } else {
            echo '<script>alert("Login failed. Please check your email and password.");</script>';
        }

        $staffStmt->close();
        mysqli_close($conn);
    }

}

// Concrete class for register
class Register extends Authentication {

    public function authenticate() {
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
        // Code for register authentication
        $stmt = $conn->prepare("INSERT INTO customer (email, customerName, mobile, password) VALUES (?, ?, ?, ?)");
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $this->email, $this->name, $this->phone, $passwordHash);

        if ($stmt->execute()) {
            echo '<script>alert("Customer : ' . $this->name . ' has been registered successfully");</script><br><script>window.location.href = "CustomerLogin.php";</script>';
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        mysqli_close($conn);
    }

}

use PHPMailer\PHPMailer\PHPMailer;

class ForgetPassword extends Authentication {

    public function authenticate() {
        // Code for forget password authentication

        $servername = 'localhost';
        $username = 'root';
        $serverpassword = '';
        $dbname = 'ip';
        $random_string = bin2hex(random_bytes(16));

        // Create connection
        $conn = mysqli_connect($servername, $username, $serverpassword, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            $stmt = $conn->prepare("UPDATE customer SET resetCode = ? WHERE email = ?");
            $stmt->bind_param("ss", $random_string, $this->email);
            if ($stmt->execute()) {
                // SMTP configuration
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host = 'smtp.gmail.com';                       // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                $mail->Username = 'jeprinting7@gmail.com';         // SMTP username
                $mail->Password = 'zlatotygvgrhhked';                   // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                // Recipients
                $mail->setFrom('your_gmail_username@gmail.com', 'JE Printing Shops');
                $mail->addAddress($this->email, $this->email);                            // Add a recipient
                // Content
                $mail->isHTML(true);                                        // Set email format to HTML
                $mail->Subject = 'Reset Password Request';
                $mail->Body = '   <div style="background-color:rgba(43,222,222,255); padding: 50px ">
        <table style=" margin: 0 auto;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);background-color: white">
            <thead>
                <tr>
                    <th style="text-align: center;padding-top: 15px;color: black;"><h2>Reset Your Password</h2></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;color: black;">Press the button below to reset your password</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><h4></br>    <div style="text-align: center;">
    <a href="http://localhost/IP_Assignment/CustomerResetPasswordPage.php?id=' . $random_string . '" style="background-color: rgba(43,222,222,255); color: white; border: none; padding:10px 50px;text-decoration: none;">Reset</a>
</div></h4>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 10px;padding-right: 10px;color: black;"></br>
                        If that does not work, copy and paste the following link in your browser
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 10px;padding-right: 10px;padding-bottom: 15px;color: black;"></br>sdasdadsdad</td>
                </tr>
            </tbody>
        </table>
        </div>';
                $mail->send();
                echo '<script>alert("Password reset email has been sent to your gmail, check your inbox now!");</script>';
            } else {
                echo "Error adding new field: " . $stmt->error;
            }
            $stmt->close();
        } catch (Exception $e) {
            echo "Password reset email could not be sent. Error message: {$mail->ErrorInfo}";
        }
    }

}

class ResetPassword extends Authentication {

    public function authenticate() {
        // Code for reset password authentication
        $servername = 'localhost';
        $username = 'root';
        $serverpassword = '';
        $dbname = 'ip';
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
        // Create connection
        $conn = mysqli_connect($servername, $username, $serverpassword, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $stmt = $conn->prepare("UPDATE customer SET password = ? WHERE resetCode = ?");
        $stmt->bind_param("ss", $passwordHash, $this->resetCode);
        if ($stmt->execute()) {
            $deleteResetCodestmt = $conn->prepare("UPDATE customer SET resetCode = NULL WHERE resetCode = ?");
            $deleteResetCodestmt->bind_param("s", $this->resetCode);
            if ($deleteResetCodestmt->execute()) {
                echo '<script>alert("Password has been succesfully changed, login to our website now!");</script><br><script>window.location.href = "CustomerLogin.php";</script>';
                $stmt->close();
            } else {
                echo "Error adding new field: " . $stmt->error;
            }
        } else {
            echo "Error adding new field: " . $stmt->error;
        }
    }

}

// Factory class for creating login and register objects
class AuthenticationFactory {

    public static function createAuthentication($type, $email, $name="", $phone="", $password="",$resetCode="") {
        if ($type == "login") {
            return new Login($email, null, null, $password,null);
        } elseif ($type == "register") {
            return new Register($email, $name, $phone, $password,null);
        } elseif ($type == "forgetPassword") {
            return new ForgetPassword($email, null, null, null);
        } elseif ($type == "resetPassword") {
            return new ResetPassword(null, null, null, $password,$resetCode);
        } else {
            throw new Exception("Invalid authentication type");
        }
    }

}
