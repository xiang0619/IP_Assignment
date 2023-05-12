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
$xml = simplexml_load_file('../Admin/xml/AdminProduct.xml');
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
              <h4>Delete Product</h4>
            </div>
            <div class="card-body">
              <form method="post" id="deleteProductForm" action="AdminProductDelete.php?id=<?php echo $xml->Product->id; ?>" onsubmit="return showConfirmationDialog()" enctype="multipart/form-data">
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
      const yesButton = confirmationDialog.querySelector('.btn-primary');
    const form = document.getElementById('deleteProductForm');
    yesButton.addEventListener('click', function() {
      form.submit();
    });
    }
</script>