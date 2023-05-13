<?php
require_once '../Shared/DesignPattern/AdminProductFacade.php';
require_once '../Shared/DesignPattern/AdminServiceFacade.php';

/**
 * @author Chin Kah Seng
 */

$paymentID = $_GET['oid'];

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name

$pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
$facade = new AdminProductFacade($pdo);
$facadeS = new AdminServiceFacade($pdo);
$orderDetails = $facade->retrieveOrderDetails($paymentID);
$customerName = $facadeS->retrieveCustomerName($orderDetails['customerID']);
$facade->updateAdminOrderXML($paymentID, $orderDetails['cartID'], $customerName['customerName'], $orderDetails['paymentID'], $orderDetails['paymentMethod'], $orderDetails['totalPayment']);

// Load the XML file
$xml = simplexml_load_file('xml/AdminOrder.xml');

?>
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
                background-color: lightsteelblue;
            }
                       
            #adminReport1 {
                color: lightsteelblue;
            }
            
            #adminProduct2 {
                color: white;
            }
                       
            #adminService1, #adminProduct1,#adminStaff{
                color:white;
            }
        </style>
    </head>
    <body>
        <?php
            include '../Shared/PHP/AdminHeader.php';
        ?>
        <!-- Main Content Area -->
        <div>
	<main class="container-fluid mb-5 mt-4 text-center" style="">
		<h1>Orders</h1>
	</main>
        
        <main class="container mx-auto mt-5 mb-5" style="max-width: 600px;">	 
          <div class="card border rounded-3">
            <div class="card-header text-center">
              <h4>Order Details</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">          
            <table class="table table-hover mx-auto" style="max-width: 600px;">
              <tbody>
                <tr>
                  <td class="" colspan="2" style="text-align: right;"><a href="AdminOrder.php">Back</a></td>
                </tr>                            
                <tr>
                  <th class="bg-dark text-light">Cart ID</th>
                  <td class="bg-light"><?php echo $xml->Order->cartID; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Customer ID</th>
                  <td class="bg-light"><?php echo $xml->Order->customerID; ?></td>
                </tr>
                <tr>
                  <th class="bg-dark text-light">Customer Name</th>
                  <td class="bg-light"><?php echo $xml->Order->customerName; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Product ID</th>
                  <td class="bg-light"><?php echo $xml->Order->productID; ?></td>
                </tr>
                <tr>
                  <th class="bg-dark text-light">Product Name</th>
                  <td class="bg-light"><?php echo $xml->Order->productName; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Product Quantity</th>
                  <td class="bg-light"><?php echo $xml->Order->productQty; ?></td>
                </tr>
                <tr>
                  <th class="bg-dark text-light">Payment ID</th>
                  <td class="bg-light"><?php echo $xml->Order->paymentID; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Total Payment</th>
                  <td class="bg-light">RM <?php echo $xml->Order->totalPayment; ?></td>
                </tr> 
                <tr>
                  <th class="bg-dark text-light">Payment Method</th>
                  <td class="bg-light"><?php echo $xml->Order->paymentMethod; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
            </div>
          </div>
        </main>
        </div>
    </body>
</html>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

