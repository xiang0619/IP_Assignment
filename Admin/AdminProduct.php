<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
include "AdminProductRetrieve.php";
$xslFile = "xsl/AdminProduct.xsl";

// Apply the XSLT stylesheet to the XML data
$xslt = new XSLTProcessor();
$xsldoc = new DOMDocument();
$xsldoc->load($xslFile);
$xslt->importStylesheet($xsldoc);
$html = $xslt->transformToXML($xml);

require_once '../Shared/DesignPattern/AdminProductFacade.php';

/**
 * @author Chin Kah Seng
 */

$host = "localhost";
$dbname = "ip";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbname"; //dsn=database source name

$pdo = new PDO($dsn,$user,$password);//connect to MYSQL using PDO class
$facade = new AdminProductFacade($pdo);

$productTypeNames = $facade->retrieveProductTypes();
?>
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
            
            #adminProduct1 {
                color: lightsteelblue;
            }
            
            #adminProduct2 {
                color: white;
            }
                       
            #adminService1, #adminReport1,#adminStaff{
                color:white;
            }
            
            .mb-3 {
  display: flex;
  justify-content: space-between;
  
}

.btn {
  margin-right: 2px;
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
        <main class="container-fluid">
            <div class="mb-4">
                <button class="btn btn-primary"><a href="AdminProductAddForm.php" class="text-light">Add Product</a></button>
                <button class="btn btn-primary"><a href="AdminProductTypeAddForm.php" class="text-light">Add Product Type</a></button>
            </div>
            
            <div class="mb-3">
              <div style="display: flex; align-items: center;">
                <p style="display: inline; margin-right: 10px; padding-top:15px;">Filter by Categories:</p>
                <button class="btn btn-close-white" style="" onclick="showAll()">All</button>
                <?php
                foreach ($productTypeNames as $productTypeName) {
                  $category = $productTypeName['productTypeName'];
                  $categoryID = $productTypeName['productTypeID'];
                  echo '<button class="btn btn-close-white" style="" onclick="getProducts(' . $categoryID . ')">' . $category . '</button>';
                }
                ?>
              </div>
              <form id="search-form" method="get" style="display: flex; align-items: center;">
                <input type="text" id="search-input" class="me-2 form-control" placeholder="Search by name...">
                <button class="btn btn-primary" type="submit">Search</button>
              </form>
            </div>

            <div id="products-container" style="display: none;">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="table-dark">
                    <tr>
                      <th></th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Quantity</th>
                      <th>Status</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody id="result" class="table-light"></tbody>
                </table>
              </div>
            </div>
            
            <div id="products-container1">
              <?php echo $html; ?>

              
            </div>

        
		
       
        </main>   
        </div>
    </body>
</html>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>

<script>
      function getProducts(category) {
          document.getElementById("products-container1").style.display = "none";
          console.log('getProducts called with category:', category);
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "api/AdminProductRESTFilter.php?category=" + category, true);
          xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
              if (xhr.status == 200) {
                var result = JSON.parse(xhr.responseText);
                if (result.status == 200 && result.data.length > 0) {
                  var tbody = document.querySelector("#result");
                  tbody.innerHTML = "";
                  for (var i = 0; i < result.data.length; i++) {
                    var product = result.data[i];
                    var tr = document.createElement("tr");
                    var tdProductID = document.createElement("td"); 
                    var tdName = document.createElement("td");
                    var tdProductType = document.createElement("td");
                    var tdQuantity = document.createElement("td");
                    var tdStatus = document.createElement("td");
                    var tdUnitPrice = document.createElement("td");
                    var tdDescription = document.createElement("td");
                    var tdImage = document.createElement("td");           

                    tdProductID.textContent = product.productID;    
                    tdProductType.textContent = product.productType;
                    tdQuantity.textContent = product.quantity;
                    tdStatus.textContent = product.status;
                    tdUnitPrice.textContent = product.unitPrice;
                    tdDescription.textContent = product.description;



                    var nameLink = document.createElement("a");
                    nameLink.href = "AdminProductDetails.php?id=" + product.productID;
                    nameLink.classList.add("text-dark");
                    nameLink.textContent = product.name;
                    tdName.appendChild(nameLink);

                    var img = document.createElement("img");
                    img.src = "../Shared/Image/"+ product.image;  
                    img.alt= "No Img"; 
                    img.width="50"; 
                    img.height="50";
                    tdImage.appendChild(img);

                    // Create td element for buttons
                    var tdButtons = document.createElement("td");


                    // Create Edit button
                    var btnEdit = document.createElement("button");
                    btnEdit.classList.add("btn", "btn-success", "me-2");
                    var editLink = document.createElement("a");
                    editLink.href = "AdminProductEditForm.php?id=" + product.productID;
                    editLink.textContent = "Edit";
                    editLink.classList.add("text-white");
                    btnEdit.appendChild(editLink);

                    // Create Delete button
                    var btnDelete = document.createElement("button");
                    btnDelete.classList.add("btn", "btn-danger");
                    var deleteLink = document.createElement("a");
                    deleteLink.href = "AdminProductDeleteForm.php?id=" + product.productID;
                    deleteLink.textContent = "Delete";
                    deleteLink.classList.add("text-white");
                    btnDelete.appendChild(deleteLink);

                    var columnWidths = [1, 4, 2, 1, 2, 1, 5, 3, 3];

                    // Iterate over the columns and set the width for each td element
                    for (var columnIndex = 0; columnIndex < columnWidths.length; columnIndex++) {
                      var tdElement;
                      switch (columnIndex) {
                        case 0:
                          tdElement = tdProductID;
                          break;
                        case 1:
                          tdElement = tdName;
                          break;
                        case 2:
                          tdElement = tdProductType;
                          break;
                        case 3:
                          tdElement = tdQuantity;
                          break;
                        case 4:
                          tdElement = tdStatus;
                          break;
                        case 5:
                          tdElement = tdUnitPrice;
                          break;
                        case 6:
                          tdElement = tdDescription;
                          break;
                        case 7:
                          tdElement = tdImage;
                          break;
                        case 8:
                          tdElement = tdButtons;
                          break;
                        default:
                          continue;
                      }

                      var ratio = columnWidths[columnIndex];
                      var width = ratio * 20 + "px"; // Adjust the width multiplier (20px) based on your requirements
                      tdElement.style.width = width;
                    }

                    // Append buttons to tdButtons element
                    tdButtons.appendChild(btnEdit);
                    tdButtons.appendChild(btnDelete);

                    tr.appendChild(tdButtons);
                    tr.appendChild(tdProductID);
                    tr.appendChild(tdName);
                    tr.appendChild(tdProductType);
                    tr.appendChild(tdQuantity);
                    tr.appendChild(tdStatus);
                    tr.appendChild(tdUnitPrice);
                    tr.appendChild(tdDescription);
                    tr.appendChild(tdImage);

                    tbody.appendChild(tr);
                }
                  document.getElementById("products-container").style.display = "block";
                } else {
                  var tbody = document.querySelector("#result");
                  tbody.innerHTML = "<tr><td colspan='9' style='text-align:center;'>No products found</td></tr>";
                  document.getElementById("products-container").style.display = "block";
                }
              } else {
                var tbody = document.querySelector("#result");
                tbody.innerHTML = "<tr><td colspan='9' style='text-align:center;'>No products found</td></tr>";
                  document.getElementById("products-container").style.display = "block";
              }
            }
          };
          xhr.send();
        }


        function showAll() {
            document.getElementById("products-container").style.display = "none";
            document.getElementById("products-container1").style.display = "block";
         }

        document.querySelector('#search-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submit action
            var productName = document.querySelector('#search-input').value.trim();
            if (productName) {
              searchProducts(productName);
            }
        });
        
        function searchProducts(productName) {
          document.getElementById("products-container1").style.display = "none";
          console.log('searchProducts called with productName:', productName);
          var xhr = new XMLHttpRequest();
          xhr.open("GET", "api/AdminProductRESTSearch.php?productName=" + productName, true);
          xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
              if (xhr.status == 200) {
                var result = JSON.parse(xhr.responseText);
                if (result.status == 200 && result.data.length > 0) {
                  var tbody = document.querySelector("#result");
                  tbody.innerHTML = "";
                  for (var i = 0; i < result.data.length; i++) {
                    var product = result.data[i];
                    var tr = document.createElement("tr");
                    var tdProductID = document.createElement("td"); 
                    var tdName = document.createElement("td");
                    var tdProductType = document.createElement("td");
                    var tdQuantity = document.createElement("td");
                    var tdStatus = document.createElement("td");
                    var tdUnitPrice = document.createElement("td");
                    var tdDescription = document.createElement("td");
                    var tdImage = document.createElement("td");           

                    tdProductID.textContent = product.productID;    
                    tdProductType.textContent = product.productType;
                    tdQuantity.textContent = product.quantity;
                    tdStatus.textContent = product.status;
                    tdUnitPrice.textContent = product.unitPrice;
                    tdDescription.textContent = product.description;



                    var nameLink = document.createElement("a");
                    nameLink.href = "AdminProductDetails.php?id=" + product.productID;
                    nameLink.classList.add("text-dark");
                    nameLink.textContent = product.name;
                    tdName.appendChild(nameLink);

                    var img = document.createElement("img");
                    img.src = "../Shared/Image/"+ product.image;  
                    img.alt= "No Img"; 
                    img.width="50"; 
                    img.height="50";
                    tdImage.appendChild(img);

                    // Create td element for buttons
                    var tdButtons = document.createElement("td");


                    // Create Edit button
                    var btnEdit = document.createElement("button");
                    btnEdit.classList.add("btn", "btn-success", "me-2");
                    var editLink = document.createElement("a");
                    editLink.href = "AdminProductEditForm.php?id=" + product.productID;
                    editLink.textContent = "Edit";
                    editLink.classList.add("text-white");
                    btnEdit.appendChild(editLink);

                    // Create Delete button
                    var btnDelete = document.createElement("button");
                    btnDelete.classList.add("btn", "btn-danger");
                    var deleteLink = document.createElement("a");
                    deleteLink.href = "AdminProductDeleteForm.php?id=" + product.productID;
                    deleteLink.textContent = "Delete";
                    deleteLink.classList.add("text-white");
                    btnDelete.appendChild(deleteLink);

                    var columnWidths = [1, 4, 2, 1, 2, 1, 5, 3, 3];

                    // Iterate over the columns and set the width for each td element
                    for (var columnIndex = 0; columnIndex < columnWidths.length; columnIndex++) {
                      var tdElement;
                      switch (columnIndex) {
                        case 0:
                          tdElement = tdProductID;
                          break;
                        case 1:
                          tdElement = tdName;
                          break;
                        case 2:
                          tdElement = tdProductType;
                          break;
                        case 3:
                          tdElement = tdQuantity;
                          break;
                        case 4:
                          tdElement = tdStatus;
                          break;
                        case 5:
                          tdElement = tdUnitPrice;
                          break;
                        case 6:
                          tdElement = tdDescription;
                          break;
                        case 7:
                          tdElement = tdImage;
                          break;
                        case 8:
                          tdElement = tdButtons;
                          break;
                        default:
                          continue;
                      }

                      var ratio = columnWidths[columnIndex];
                      var width = ratio * 20 + "px"; // Adjust the width multiplier (20px) based on your requirements
                      tdElement.style.width = width;
                    }

                    // Append buttons to tdButtons element
                    tdButtons.appendChild(btnEdit);
                    tdButtons.appendChild(btnDelete);

                    tr.appendChild(tdButtons);
                    tr.appendChild(tdProductID);
                    tr.appendChild(tdName);
                    tr.appendChild(tdProductType);
                    tr.appendChild(tdQuantity);
                    tr.appendChild(tdStatus);
                    tr.appendChild(tdUnitPrice);
                    tr.appendChild(tdDescription);
                    tr.appendChild(tdImage);

                    tbody.appendChild(tr);
                }
                  document.getElementById("products-container").style.display = "block";
                } else {
                  var tbody = document.querySelector("#result");
                  tbody.innerHTML = "<tr><td colspan='9' style='text-align:center;'>No products found</td></tr>";
                  document.getElementById("products-container").style.display = "block";
                }
              } else {
                var tbody = document.querySelector("#result");
                tbody.innerHTML = "<tr><td colspan='9' style='text-align:center;'>No products found</td></tr>";
                  document.getElementById("products-container").style.display = "block";
              }
            }
          };
          xhr.send();
        }

        
    </script>