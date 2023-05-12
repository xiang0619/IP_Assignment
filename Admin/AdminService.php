<?php
require_once '../Shared/DesignPattern/AdminServiceFacade.php';

/**
 * @author Chin Kah Seng
 */

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name

$pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
$facade = new AdminServiceFacade($pdo);

$serviceOrders = $facade->retrieveServiceOrder();

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
                       
            #adminService1 {
                color: lightsteelblue;
            }
            
            #adminService2 {
                color: white;
            }
                       
            #adminProduct1, #adminReport1,#adminStaff{
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
	<main class="container-fluid mb-4 mt-4 text-center" style="">
		<h1>Services</h1>
	</main>
        
        <main class="container-fluid">
		<div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="table-dark">
                        <tr>
                          <th>Cart ID</th>
                          <th>Service ID</th>
                          <th>Customer ID</th>
                          <th>Customer Name</th>
                          <th>Quantity</th>
                          <th>File</th>
                          <th>Download Status</th>
                        </tr>
                      </thead>
                      <tbody class="table-light">                    
                          <?php foreach ($serviceOrders as $serviceOrder): if($serviceOrder['serviceID'] != null || $serviceOrder['serviceID'] != "") {?>
                            <tr>
                                <td><?php echo $serviceOrder['cartID']; ?></td>
                                <td><?php echo $serviceOrder['serviceID']; ?></td>
                                <td><?php echo $serviceOrder['customerID']; ?></td>
                                <td>
                                    <?php
                                        $customerName = $facade->retrieveCustomerName($serviceOrder['customerID']);
                                        echo $customerName['customerName'];
                                    ?>
                                </td>
                                <td><?php echo $serviceOrder['quantity']; ?></td>
                                <td><?php
                                    $file = $serviceOrder['file'];
                                    $file_path = '../Shared/pdfFile/'.$file;
                                    echo '<a href="' . $file_path . '" download onclick="setTimeout(function() { window.location.href = \'AdminServiceUpdateDownloadStatus.php?cartID=' . $serviceOrder['cartID'] . '\'; }, 1000);">'.$file.'</a>';
                            
                                ?></td>
                                <td><?php echo $serviceOrder['downloadStatus']; ?></td>
                            </tr>
                          <?php } endforeach; ?>             
                      </tbody>
                    </table>
                  </div>
        </main>
        </div>
    </body>
</html>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>


