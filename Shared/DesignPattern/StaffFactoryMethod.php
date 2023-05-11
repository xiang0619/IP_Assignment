<?php

require_once __DIR__ . '/../../Shared/Helper/EncryptionHelper.php';

abstract class Authentication {

    protected $id;
    protected $email;
    protected $name;
    protected $status;
    protected $position;
    protected $mobile;
    protected $password;

    public function __construct($id = "", $email = "", $name = "", $status = "", $position = "", $mobile = "", $password = "") {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->status = $status;
        $this->position = $position;
        $this->mobile = $mobile;
        $this->password = $password;
    }

    abstract public function authenticate();
}

class AddStaff extends Authentication {

    public function authenticate() {
        $staffID = $_SESSION['staffID'];
        $encryptionHelper = new EncryptionHelper("Staff");

        $encryptStaffID = $encryptionHelper->decrypt($staffID);

        $servername = 'localhost';
        $username = 'root';
        $serverpassword = '';
        $dbname = 'ip';
        $current_date = date('Y-m-d');
        $date_param = &$current_date;
        $createdID = $encryptStaffID;
        $status = "employed";
        // Create connection
        $conn = mysqli_connect($servername, $username, $serverpassword, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Code for register authentication
        $stmt = $conn->prepare("INSERT INTO staff (email, name, status, position, mobile, createdID, createdDate, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssssss", $this->email, $this->name, $status, $this->position, $this->mobile, $createdID, $date_param, $passwordHash);

        if ($stmt->execute()) {
            echo '<script>alert("Staff : ' . $this->name . ' has been created successfully");</script><br><script>window.location.href = "AdminStaff.php";</script>';
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        mysqli_close($conn);
    }

}

class EditStaff extends Authentication {

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

        $stmt = $conn->prepare("UPDATE staff SET email = ?, name = ?, status=?, position=?, mobile=?  WHERE ID = ?");

        $stmt->bind_param("ssssss", $this->email, $this->name, $this->status, $this->position, $this->mobile, $this->id);
        if ($stmt->execute()) {
            echo '<script>alert("Staff has been successfully updated!");</script><br><script>window.location.href = "AdminStaff.php";</script>';
            $stmt->close();
        } else {
            echo "Error adding new field: " . $stmt->error;
        }
    }

}

// Factory class for creating login and register objects
class AuthenticationFactory {

    public static function createAuthentication($type, $id, $email, $name = "", $status = "", $position = "", $mobile = "", $password = "") {
        if ($type == "addStaff") {
            return new AddStaff(null, $email, $name, $status, $position, $mobile, $password);
        }
        if ($type == "editStaff") {
            return new EditStaff($id, $email, $name, $status, $position, $mobile, null);
        }
    }

}
