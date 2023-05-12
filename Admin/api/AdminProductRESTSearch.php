<?php

/**
 * Description of ProductAdmin
 *
 * @author Chin Kah Seng
 */

header("Content-Type:application/json");
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

if (!empty($_GET['productName'])) {
  $productName = $_GET['productName'];
  $sql = "SELECT * FROM product WHERE name LIKE CONCAT('%', :productName, '%')";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':productName', $productName);
  $stmt->execute();

  $products = array();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      
    $sql1 = "SELECT productTypeName FROM producttype WHERE productTypeID=:category";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':category', $row["productTypeID"]);
    $stmt1->execute();
    $result = $stmt1->fetch(PDO::FETCH_ASSOC);
  
    $product = array(
      "productID" => $row["productID"],
      "name" => $row["name"],
      "productType" => $result["productTypeName"],
      "quantity" => $row["quantity"],
      "status" => $row["status"],
      "unitPrice" => $row["unitPrice"],
      "description" => $row["description"],
      "image" => $row["image"],
      "uploadDate" => $row["uploadDate"],
      "updatedID" => $row["updatedID"],
      "updatedDate" => $row["updatedDate"],
      "createID" => $row["createID"],
      "createdDate" => $row["createdDate"]
    );
    array_push($products, $product);
  }

  if (count($products) > 0) {
    response(200, $products);
  } else {
    response(404, "No products found for productName '$productName'");
  }
} else {
  response(400, "Invalid Request", NULL);
}

$conn = null;

function response($status, $data) {
  header("HTTP/1.1 " . $status);
  $response['status'] = $status;
  $response['data'] = $data;
  $json_response = json_encode($response);
  echo $json_response;
}
