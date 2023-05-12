<?php
require_once '../Shared/DesignPattern/AdminProductFacade.php';

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
            
            
            .confirmationDialog {
              display: none;
              position: fixed;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              z-index: 9999;
              background-color: #ffffff;
              border: 1px solid #000000;
              padding: 20px;
              box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            }

            .confirmationDialog p {
              margin-top: 0;
            }

            .confirmationDialogButtons {
              display: flex;
              justify-content: center;
            }

            .confirmationDialogButtons button {
              margin: 0 10px;
              padding: 5px 10px;
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
              <h4>Edit Product Type</h4>
            </div>
            <div class="card-body ms-1 me-1">
              <form method="post" action="AdminProductTypeEdit.php" id="editProductTypeForm" enctype="multipart/form-data" onsubmit="return showConfirmationDialog()">
                <div class="mb-3">
                  <label for="category" class="form-label mt-2">Product Type:</label>
                  <select class="form-control" id="category" name="category" required>
                    <option value="">Select a product type name you wish to edit</option>                   
                    <?php foreach ($productTypeNames as $productType) { ?>
                        <option value="<?php echo $productType['productTypeName']; ?>"><?php echo $productType['productTypeName']; ?></option>
                    <?php } ?>
                  </select>
                  <span id="categoryError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                  <label for="productTypeName" class="form-label mt-2">Product Type New Name:</label>
                  <input type="text" class="form-control" id="productTypeName" name="productTypeName" required>
                  <span id="productTypeNameError" class="text-danger"></span>
                </div>
                <div class="row mt-4">
                  <div class="col text-center">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"  onclick="window.location.href='AdminProduct.php'">Cancel</button>
                    <button type="submit" id="confirm" class="btn btn-primary" onclick="return validateForm()">Confirm</button>
                  </div>
                </div>
                <div class="row mt-4">
                   <p style="text-align: center;"><a href="AdminProductTypeAddForm.php">Add Product Type?</a></p>
                </div>
              </form>
            </div>
          </div>
            
          <div class="confirmationDialog">
              <p>Are you sure you want to submit?</p>
              <div class="confirmationDialogButtons">
                <button type="submit" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary">No</button>
              </div>
          </div>
        </main>

        </div>
    </body>
</html>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

<script>
    
    function showConfirmationDialog() {
      event.preventDefault();
      const confirmationDialog = document.querySelector('.confirmationDialog');
      confirmationDialog.style.display = 'block';
      const cancelButton = confirmationDialog.querySelector('.btn-secondary');
      cancelButton.addEventListener('click', function() {
        confirmationDialog.style.display = 'none';
      });
    }
    
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
            // If the name input is not empty, clear any error message
            document.getElementById("productTypeNameError").textContent = "";

            // Check if the name already exists in the product names array
            var productTypeNames = <?php echo json_encode($productTypeNames); ?>;
            var index = -1;
            for (var i = 0; i < productTypeNames.length; i++) {
              if (productTypeNames[i]['productTypeName'] === productTypeNameValue) {
                index = i;
                break;
              }
            }

            if (index >= 0) {
              // If the name already exists in the array, display an error message and return false
              document.getElementById("productTypeNameError").textContent = "*This product type name has been registered.";
              return false;
            } else {
              // If the name does not exist in the array, clear any error message and return true
              document.getElementById("productTypeNameError").textContent = "";
              return true;
            }
        }
    }
    
    document.getElementById("productTypeName").addEventListener("input", validateProductTypeName);
    
    function validateCategory() {
        var categoryInput = document.getElementById("category");
        var categoryValue = categoryInput.value;
        
        if (categoryValue === "") {
            document.getElementById("categoryError").textContent = "*Please select a product type name you wish to edit.";
            return false;
        } else {
            document.getElementById("categoryError").textContent = "";
            return true;
        }
    }
    
    function validateForm() {
        // Get the values of all input fields
        var productTypeNameValue = document.getElementById("productTypeName").value;
        var categoryValue = document.getElementById("category").value;
        
        // Check if all fields are valid
        var isProductTypeNameValid = validateProductTypeName(productTypeNameValue);     
        var isCategoryValid = validateCategory(categoryValue);
        
        // If any field is invalid, prevent the form from submitting and display error messages
        if (!isProductTypeNameValid || !isCategoryValid) {
            event.preventDefault(); // Prevent the form from submitting
            return false;
        } else {
            // show confirmation dialog
            const confirmationDialog = document.querySelector('.confirmationDialog');
            const yesButton = confirmationDialog.querySelector('.btn-primary');
            const form = document.getElementById('editProductTypeForm');
            yesButton.addEventListener('click', function() {
              form.submit();
            });
        }
        
        
    }
    
    // Add an event listener to the submit button that calls the validateForm function
    document.getElementById("confirm").addEventListener("click", validateForm);
    </script>