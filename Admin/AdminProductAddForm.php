

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<!-- author:Chin Kah Seng -->
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
        <?php
            require_once '../Shared/DesignPattern/AdminProductFacade.php';
            require_once '../Shared/Helper/EncryptionHelper.php';

            $host = "localhost";
            $dbname = "ip";
            $user = "root";
            $password = "";
            $dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name

            $pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
            $facade = new AdminProductFacade($pdo);

            $productTypeNames = $facade->retrieveProductTypes();
            $productNames = $facade->checkNameExist();
            
            $staffID = $_SESSION['staffID'];
            $encryptionHelper = new EncryptionHelper("Staff");
            $encryptStaffID = $encryptionHelper->decrypt($staffID);

        ?>
        <!-- Main Content Area -->
        <div>
	<main class="container-fluid mb-4 mt-4 text-center" style="">
		<h1>Products</h1>
	</main>
        
        <main class="container mx-auto mt-5 mb-5" style="max-width: 600px;">
          <div class="card border rounded-3">
            <div class="card-header text-center">
              <h4>Add Product</h4>
            </div>
            <div class="card-body ms-1 me-1">
              <form method="post" action="AdminProductAdd.php" id="addProductForm" enctype="multipart/form-data" onsubmit="return showConfirmationDialog()">
                <div class="mb-3">
                  <label for="item_name" class="form-label mt-2">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                  <span id="nameError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                  <label for="category" class="form-label mt-2">Category:</label>
                  <select class="form-control" id="category" name="category" required>
                    <option value="">Select a category</option>                   
                    <?php foreach ($productTypeNames as $productType) { ?>
                        <option value="<?php echo $productType['productTypeName']; ?>"><?php echo $productType['productTypeName']; ?></option>
                    <?php } ?>
                  </select>
                  <span id="categoryError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                  <label for="quantity" class="form-label mt-2">Quantity:</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" required>
                  <span id="quantityError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                  <label for="unit_price" class="form-label mt-2">Unit Price:</label>
                  <input type="number" step="0.01" class="form-control" id="unit_price" name="unit_price"" required>
                  <span id="unitPriceError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label mt-2">Image:</label>
                  <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                  <span id="imageError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label mt-2">Description:</label>
                  <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                  <span id="descriptionError" class="text-danger"></span>
                </div>
                <div class="row mt-4">
                  <div class="col text-center">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"  onclick="window.location.href='AdminProduct.php'">Cancel</button>
                    <button type="submit" id="confirm" class="btn btn-primary" onclick="return validateForm();">Confirm</button>
                  </div>
                   <input type="hidden" name="staffID" value="<?php echo $encryptStaffID; ?>">
                </div>
              </form>
            </div>
          </div>
        </main>

        </div>
        
        <div class="confirmationDialog">
          <p>Are you sure you want to submit?</p>
          <div class="confirmationDialogButtons">
            <button type="submit" class="btn btn-primary">Yes</button>
            <button type="button" class="btn btn-secondary">No</button>
          </div>
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

    function validateName() {
      // Get the name input element and its value
      var nameInput = document.getElementById("name");
      var nameValue = nameInput.value;

      // Check if the name input is empty
      if (nameValue.trim() === "") {
        // If the name input is empty, display an error message and return false
        document.getElementById("nameError").textContent = "*Please enter a name.";
        return false;
      } else {
        // If the name input is not empty, clear any error message
        document.getElementById("nameError").textContent = "";

        // Check if the name already exists in the product names array
        var productNames = <?php echo json_encode($productNames); ?>;
        var index = -1;
        for (var i = 0; i < productNames.length; i++) {
          if (productNames[i]['name'] === nameValue) {
            index = i;
            break;
          }
        }

        if (index >= 0) {
          // If the name already exists in the array, display an error message and return false
          document.getElementById("nameError").textContent = "*This product name has been registered.";
          return false;
        } else {
          // If the name does not exist in the array, clear any error message and return true
          document.getElementById("nameError").textContent = "";
          return true;
        }
      }
    }

    // Add an event listener to the name input that calls the validateName function on input change
    document.getElementById("name").addEventListener("input", validateName);

    function validateCategory() {
        var categoryInput = document.getElementById("category");
        var categoryValue = categoryInput.value;
        
        if (categoryValue === "") {
            document.getElementById("categoryError").textContent = "*Please select a category.";
            return false;
        } else {
            document.getElementById("categoryError").textContent = "";
            return true;
        }
    }
    
    document.getElementById("category").addEventListener("change", validateCategory);

    function validateQuantity() {
        var quantityInput = document.getElementById("quantity");
        var quantityValue = quantityInput.value;
        
        if (quantityValue === "") {
            document.getElementById("quantityError").textContent = "*Please enter a valid quantity.";
            return false;
        } else if (quantityValue <= 0) {
            document.getElementById("quantityError").textContent = "*Quantity must be greater than 0.";
            return false;
        } else {
            document.getElementById("quantityError").textContent = "";
            return true;
        }
    }
    
    document.getElementById("quantity").addEventListener("input", validateQuantity);

    function validateUnitPrice() {
        var unitPriceInput = document.getElementById("unit_price");
        var unitPriceValue = unitPriceInput.value;
        
        if (unitPriceValue === "") {
            document.getElementById("unitPriceError").textContent = "*Please enter a valid unit price.";
            return false;
        } else if (unitPriceValue <= 0) {
            document.getElementById("unitPriceError").textContent = "*Unit price must be greater than 0.";
            return false;
        } else {
            document.getElementById("unitPriceError").textContent = "";
            return true;
        }
    }
    
    document.getElementById("unit_price").addEventListener("input", validateUnitPrice);

    function validateImage() {
        var imageInput = document.getElementById("image");
        var imageValue = imageInput.value;
        
        // Check if an image has been selected
        if (imageValue === "") {
            document.getElementById("imageError").textContent = "*Please select an image file.";
            return false;
        } else {
            // Get the file extension of the selected file
            var fileExtension = imageValue.split('.').pop().toLowerCase();
            
            // Check if the file extension is valid
            if (fileExtension !== "jpg" && fileExtension !== "jpeg" && fileExtension !== "png") {
                document.getElementById("imageError").textContent = "*Please select a valid image file (JPG or PNG).";
                return false;
            } else {
                document.getElementById("imageError").textContent = "";
                return true;
            }
        }
    }
    
    document.getElementById("image").addEventListener("change", validateImage);

    function validateDescription() {
        var descriptionInput = document.getElementById("description");
        var descriptionValue = descriptionInput.value;
        
        if (descriptionValue.trim() === "") {
            document.getElementById("descriptionError").textContent = "*Please enter a description.";
            return false;
        } else {
            document.getElementById("descriptionError").textContent = "";
            return true;
        }
    }
    
    document.getElementById("description").addEventListener("input", validateDescription);

    function validateForm() {
        // Get the values of all input fields
        var nameValue = document.getElementById("name").value;
        var categoryValue = document.getElementById("category").value;
        var quantityValue = document.getElementById("quantity").value;
        var unitPriceValue = document.getElementById("unit_price").value;
        var imageValue = document.getElementById("image").value;
        var descriptionValue = document.getElementById("description").value;
        
        // Check if all fields are valid
        var isNameValid = validateName(nameValue);
        var isCategoryValid = validateCategory(categoryValue);
        var isQuantityValid = validateQuantity(quantityValue);
        var isUnitPriceValid = validateUnitPrice(unitPriceValue);
        var isImageValid = validateImage(imageValue);
        var isDescriptionValid = validateDescription(descriptionValue);
        
        // If any field is invalid, prevent the form from submitting and display error messages
        if (!isNameValid || !isCategoryValid || !isQuantityValid || !isUnitPriceValid || !isImageValid || !isDescriptionValid) {
            event.preventDefault(); // Prevent the form from submitting
            return false;
        }else{
            // show confirmation dialog
            const confirmationDialog = document.querySelector('.confirmationDialog');
            const yesButton = confirmationDialog.querySelector('.btn-primary');
            const form = document.getElementById('addProductForm');
            yesButton.addEventListener('click', function() {
              form.submit();
            });
        }               
    }
   
</script>


