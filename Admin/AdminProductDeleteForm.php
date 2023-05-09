<?php
require_once 'AdminProductFacade.php';

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
$xml = simplexml_load_file('AdminProduct.xml');
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
        </style>
    </head>
    <body>
        <div class="sticky-top">
        <nav class="navbar navbar-dark bg-dark sticky-top">
          <div class="container-fluid">           
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <ul class="nav justify-content-center">          
              <li class="nav-item">
                <a class="nav-link active" style="color: lightblue" href="AdminProduct.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="AdminService.php">Services</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-light" href="AdminReport.php">Report</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-light" href="#">|</a>
              </li>
              <li class="nav-item">
                  <div class="dropdown">
                      <a class="d-inline-block nav-link text-light" tabindex="0" data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person icon-size" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li>
                            <div class="text-center mt-2">
                                <a class="dropdown-item" href="AdminProfile.php">Profile</a>
                            </div>
                        </li>
                        <li>
                            <div class="text-center mt-2">
                                <a class="dropdown-item" href="#">Add Staff</a>
                            </div>
                        </li>
                        <li>
                            <div class="text-center mt-4 mb-3">
                                <button type="button" class="btn btn-outline-danger">Log Out</button>
                            </div></li>
                      </ul>
                  </div>
                  
                    
                    
                 
              </li>
            </ul>
              
            <a class="navbar-brand fixed-end ms-3" href="AdminHome.php">JE</a>
            
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">                 
                <h5 class="offcanvas-title mx-auto" id="offcanvasDarkNavbarLabel">
                    <a class="navbar-brand fixed-end ms-3" href="AdminHome.php">JE</a>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>                       
              </div>
               
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">                
                  <li class="nav-item">
                    <a class="nav-link" href="AdminHome.php">Dashboard</a>
                  </li>
                  <hr class="bg-dark border-1 border-top border-light">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="AdminProduct.php">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="AdminService.php">Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="AdminReport.php">Report</a>
                  </li> 
                  <hr class="bg-dark border-1 border-top border-light">
                  <li class="nav-item">
                    <a class="nav-link" href="AdminProfile.php">Profile</a>
                  </li> 
                  <li class="nav-item">
                      <div class="text-center mt-5">
                        <button type="button" class="btn btn-outline-danger">Log Out</button>
                      </div>
                  </li> 
                </ul>  
              </div>
            </div>
          </div>
        </nav>
        </div>
        <!-- Main Content Area -->
        <div>
	<main class="container-fluid mb-4 mt-4 text-center" style="">
		<h1>Products</h1>
	</main>
        
        <main class="container mx-auto mt-5 mb-5" style="max-width: 600px;">
          <div class="card border rounded-3">
            <div class="card-header text-center">
              <h4>Delete Product</h4>
            </div>
            <div class="card-body">
              <form method="post" action="AdminProductDelete.php?id=<?php echo $xml->Product->id; ?>" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-hover mx-auto" style="max-width: 600px;">
                      <tbody>
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
                          <th class="bg-dark text-light">Upload ID</th>
                          <td class="bg-light"><?php echo $xml->Product->uploadDate; ?></td>
                        </tr>
                        <tr>
                          <th class="bg-light text-dark">Updated ID</th>
                          <td class="bg-light"><?php echo $xml->Product->updatedID; ?></td>
                        </tr>
                        <tr>
                          <th class="bg-dark text-light">Updated Date</th>
                          <td class="bg-light"><?php echo $xml->Product->updatedDate; ?></td>
                        </tr>
                        <tr>
                          <th class="bg-light text-dark">Created ID</th>
                          <td class="bg-light"><?php echo $xml->Product->createID; ?></td>
                        </tr>
                        <tr>
                          <th class="bg-dark text-light">Created Date</th>
                          <td class="bg-light"><?php echo $xml->Product->createdDate; ?></td>
                        </tr>                       
                      </tbody>
                    </table>
                      <div class="text-center">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"  onclick="window.location.href='AdminProduct.php'">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                      </div>
                  </div>
              </form>
            </div>
          </div>
        </main>

        </div>
    </body>
</html>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
