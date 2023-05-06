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
        <link href="Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        
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
        <nav class="navbar navbar-dark bg-dark sticky-top>
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
                            <div class="text-center mt-4">
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
              <h4>Add Product</h4>
            </div>
            <div class="card-body ms-1 me-1">
              <form method="post" action="AdminProductAdd.php" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="item_name" class="form-label mt-2">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="category" class="form-label mt-2">Category:</label>
                  <select class="form-control" id="category" name="category" required>
                    <option value="">Select a category</option>
                    <option value="Pens">Pens</option>
                    <option value="Books">Books</option>
                    <option value="Pencils">Pencils</option>
                    <option value="Erasers">Erasers</option>                  
                  </select>
                </div>
                <div class="mb-3">
                  <label for="quantity" class="form-label mt-2">Quantity:</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="mb-3">
                  <label class="form-label d-block mt-2">Status:</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="available" value="Available" required>
                    <label class="form-check-label" for="available">
                      Available
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="not_available" value="Not Available" required>
                    <label class="form-check-label" for="not_available">
                      Not Available
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="out_of_stock" value="Out of Stock" required>
                    <label class="form-check-label" for="out_of_stock">
                      Out of Stock
                    </label>
                  </div>
                  <!-- Add more radio button groups as needed -->
                </div>
                <div class="mb-3">
                  <label for="unit_price" class="form-label mt-2">Unit Price:</label>
                  <input type="number" class="form-control" id="unit_price" name="unit_price" required>
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label mt-2">Image:</label>
                  <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label mt-2">Description:</label>
                  <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="row mt-4">
                  <div class="col text-center">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
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

