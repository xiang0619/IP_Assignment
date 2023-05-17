<?php
/*Author : Tham Jun Yuan*/
?>
<?php
header('Content-Type: application/json');
//require '../../Shared/Database/CustomerDatabase.php';
include '../../Shared/Helper/EncryptionHelper.php';
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ip";

// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}



//if($_SERVER['REQUEST_METHOD'] === 'POST'){
//    
//    $customer = $_SESSION['customerID'];
//
//    $customerDatabase = new CustomerDatabase();
//    $customer = $customerDatabase->getProfile($customer);
//    
//    $product = isset($_POST['search-input']) && !empty($_POST['search-input']) ? $_POST['search-input'] : null;
//    
//    if($product == null){
//        response(400, "Please enter product name!", null);
//    }
//    
//    if($product == )
//    
//     
//    $sql = "SELECT * FROM product WHERE name LIKE CONCAT('%', :productName, '%')";
//    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':productName', $productName);
//    $stmt->execute();
//
//  $products = array();
//  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//      
//    $sql1 = "SELECT productTypeName FROM producttype WHERE productTypeID=:category";
//    $stmt1 = $conn->prepare($sql1);
//    $stmt1->bindParam(':category', $row["productTypeID"]);
//    $stmt1->execute();
//    $result = $stmt1->fetch(PDO::FETCH_ASSOC);
//  
//    $product = array(
//      "productID" => $row["productID"],
//      "name" => $row["name"],
//      "productType" => $result["productTypeName"],
//      "quantity" => $row["quantity"],
//      "status" => $row["status"],
//      "unitPrice" => $row["unitPrice"],
//      "description" => $row["description"],
//      "image" => $row["image"],
//      "uploadDate" => $row["uploadDate"],
//      "updatedID" => $row["updatedID"],
//      "updatedDate" => $row["updatedDate"],
//      "createID" => $row["createID"],
//      "createdDate" => $row["createdDate"]
//    );
//    array_push($products, $product);
//  }
//
//  if (count($products) > 0) {
//    response(200, $products);
//  } else {
//    response(404, "No products found for productName '$productName'");
//  }
//} else {
//  response(400, "Invalid Request", NULL);
//    
//    if(password_verify($oldPassword, $customer->getPassword()) && $newPassword == $rePassword){
//        $customerDayt->updatePassword($customer->getId(), $newPassword);
//        response(200, "New Password Updated.", null);
//    }
//}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $z = new EncryptionHelper("Customer");

    //decrypt id 
    $customer = $z->decrypt($_SESSION['customerID']);
  
    
    $productName = isset($_POST['search-input']) ? $_POST['search-input'] : null;

    if ($productName == null) {
        response(400, "Please provide a product name", NULL);
    } else {

         $sql = "SELECT p.paymentID, c.customerName, pd.name, p.totalPayment, p.payment_status, p.paymentDate
            FROM payment p
            INNER JOIN customer c ON p.customerID = c.customerID
            INNER JOIN product pd ON p.productID = pd.productID
            WHERE p.customerID = :customerID
            AND pd.name LIKE CONCAT('%', :productName, '%')";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':customerID', $customer, PDO::PARAM_INT);
    $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//    if ($result) {
        $payments = [];
        foreach ($result as $row) {
            $payment = [
                'paymentID' => $row['paymentID'],
                'customerName' => $row['customerName'],
                'name' => $row['name'],
                'totalPayment' => $row['totalPayment'],
                'payment_status' => $row['payment_status'],
                'payment_date' => $row['paymentDate']
            ];
            
            $payments[] = $payment;
        }
        response(200, $payments);
//    } else {
//        response(400, "Invalid Request", NULL);
//    }
    }
}

function response($status, $data) {
  header("HTTP/1.1 " . $status);
  $response['status'] = $status;
  $response['data'] = $data;
  $json_response = json_encode($response);
  echo $json_response;
}

//function response($status, $message, $data) {
//    http_response_code($status);
//    $response['status'] = $status;
//    $response['message'] = $message;
//    $response['data'] = $data;
//    $json_response = json_encode($response);
//    
//    echo $json_response;
//    exit();
//}
?>