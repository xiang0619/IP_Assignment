<?php
require_once 'AdminProductFacade.php';

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name

$pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
$facade = new AdminProductFacade($pdo);

$productTypeNames = $facade->retrieveProductTypes();

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
                       
            #adminService1, #adminReport1,#adminStaff{
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
		<h1>Products</h1>
	</main>
        
        <main class="container mx-auto mt-5 mb-5" style="max-width: 600px;">
          <div class="card border rounded-3">
            <div class="card-header text-center">
              <h4>Add Product Type</h4>
            </div>
            <div class="card-body ms-1 me-1">
              <form method="post" action="AdminProductTypeAdd.php" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="productTypeName" class="form-label mt-2">Product Type Name:</label>
                  <input type="text" class="form-control" id="productTypeName" name="productTypeName" required>
                  <span id="productTypeNameError" class="text-danger"></span>
                </div>
                <div class="row mt-4">
                  <div class="col text-center">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"  onclick="window.location.href='AdminProduct.php'">Cancel</button>
                    <button type="submit" id="confirm" class="btn btn-primary" onclick="return validateForm()">Confirm</button>
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

<script>
    function validateProductTypeName() {
        // Get the name input element and its value
        var productTypeNameInput = document.getElementById("productTypeName");
        var productTypeNameValue = productTypeNameInput.value;
        
        // Check if the name input is empty
        if (productTypeNameValue.trim() === "") {
            // If the name input is empty, display an error message and return false
            document.getElementById("productTypeNameError").textContent = "*Please enter a name for the type of product.";
            return false;
        }  else if (!/^[a-zA-Z0-9]+$/.test(productTypeNameValue)) {
            // If the name input contains non-letter characters, display an error message and return false
            document.getElementById("productTypeNameError").textContent = "*Please enter only letters & numbers.";
        return false;
        }  else {
            // If the name input is not empty, clear any error message and return true
            document.getElementById("productTypeNameError").textContent = "";
            return true;
        }
    }
    
    document.getElementById("productTypeName").addEventListener("input", validateProductTypeName);
    
    function validateForm() {
        // Get the values of all input fields
        var productTypeNameValue = document.getElementById("productTypeName").value;
        
        // Check if all fields are valid
        var isProductTypeNameValid = validateProductTypeName(productTypeNameValue);     
        
        // If any field is invalid, prevent the form from submitting and display error messages
        if (!isProductTypeNameValid) {
            event.preventDefault(); // Prevent the form from submitting
            return false;
        }
        
        // If all fields are valid, allow the form to submit
        return true;
    }
    
    // Add an event listener to the submit button that calls the validateForm function
    document.getElementById("confirm").addEventListener("click", validateForm);
    </script>