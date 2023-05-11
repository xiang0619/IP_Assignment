<?php
require_once '../Shared/DesignPattern/AdminProductFacade.php';

$productID = $_GET['id'];

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name

$pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
$facade = new AdminProductFacade($pdo);
$facade->updateAdminProductXML($productID);

// Load the XML file
$xml = simplexml_load_file('xml/AdminProduct.xml');
$productTypeID = $xml->Product->productTypeID;
$productTypeName = $facade->retrieveProductTypeName($productTypeID);

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
                       
            #adminProduct1 {
                color: lightsteelblue;
            }
            
            #adminProduct2 {
                color: white;
            }
                       
            #adminService1, #adminReport1{
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
		<h1>Products</h1>
	</main>
        
        <main class="container-fluid">	         
          <div class="table-responsive">          
            <table class="table table-hover mx-auto" style="max-width: 600px;">
              <tbody>
                <tr>
                  <td class="" colspan="2" style="text-align: right;"><a href="AdminProduct.php">Back</a></td>
                </tr>
                <tr>
                  <td class="bg-light" colspan="2" style="text-align: center;"><img src="../Shared/Image/<?php echo $xml->Product->image; ?>" alt="<?php echo $xml->Product->name; ?>" width="150" height="150"/></td>
                </tr>               
                <tr>
                  <th class="bg-dark text-light">ID</th>
                  <td class="bg-light"><?php echo $xml->Product->id; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Name</th>
                  <td class="bg-light"><?php echo $xml->Product->name; ?></td>
                </tr>
                <tr>
                  <th class="bg-dark text-light">Category</th>
                  <td class="bg-light"><?php echo $productTypeName['productTypeName']; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Quantity</th>
                  <td class="bg-light"><?php echo $xml->Product->quantity; ?></td>
                </tr>
                <tr>
                  <th class="bg-dark text-light">Status</th>
                  <td class="bg-light"><?php echo $xml->Product->status; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Unit Price</th>
                  <td class="bg-light"><?php echo $xml->Product->unitPrice; ?></td>
                </tr>
                <tr>
                  <th class="bg-dark text-light">Description</th>
                  <td class="bg-light"><?php echo $xml->Product->description; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Upload ID</th>
                  <td class="bg-light"><?php echo $xml->Product->uploadDate; ?></td>
                </tr>
                <tr>
                  <th class="bg-dark text-light">Updated ID</th>
                  <td class="bg-light"><?php echo $xml->Product->updatedID; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Updated Date</th>
                  <td class="bg-light"><?php echo $xml->Product->updatedDate; ?></td>
                </tr>
                <tr>
                  <th class="bg-dark text-light">Created ID</th>
                  <td class="bg-light"><?php echo $xml->Product->createID; ?></td>
                </tr>
                <tr>
                  <th class="bg-light text-dark">Created Date</th>
                  <td class="bg-light"><?php echo $xml->Product->createdDate; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </main>
        </div>
    </body>
</html>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

