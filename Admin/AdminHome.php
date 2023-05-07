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
                <a class="nav-link text-light" href="AdminProduct.php">Products</a>
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
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                  </li>
                  <hr class="bg-dark border-1 border-top border-light">
                  <li class="nav-item">
                    <a class="nav-link" href="AdminProduct.php">Products</a>
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
                      <div class="text-center mt-5 mb-3">
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
		<h1>Admin Dashboard</h1>
	</main>
        
        <main class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<div class="card mb-3">
					<div class="card-header">
						<h5 class="card-title">Sales</h5>
					</div>
					<div class="card-body">
						<h1>$10,000</h1>
						<p class="card-text text-success">+15% since last month</p>
					</div>
				</div>
				
				<div class="card">
					<div class="card-header">
                                            <h5 class="card-title">Users</h5>
                                            				</div>
				<div class="card-body">
					<h1>1,000</h1>
					<p class="card-text text-success">+10% since last month</p>
				</div>
			</div>
			
			<div class="card mt-3">
				<div class="card-header">
					<h5 class="card-title">Categories</h5>
				</div>
				<div class="card-body">
					<ul class="list-group">
						<li class="list-group-item">Stationery</li>
						<li class="list-group-item">Printing Service</li>					
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-lg-9">
			<div class="card mb-3">
				<div class="card-header">
					<h5 class="card-title">Recent Orders</h5>
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Customer Name</th>
								<th>Order Date</th>
								<th>Order Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>123</td>
								<td>ABC</td>
								<td>2023-04-25</td>
								<td>$500.00</td>
							</tr>
							<tr>
								<td>124</td>
								<td>DEF</td>
								<td>2023-04-26</td>
								<td>$250.00</td>
							</tr>
							<tr>
								<td>125</td>
								<td>GHI</td>
								<td>2023-04-27</td>
								<td>$750.00</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Sales Chart</h5>
				</div>
				<div class="card-body">
					<canvas id="salesChart" width="400" height="200"></canvas>
				</div>
			</div>
                </div>
                </div>
        </main>
        </div>
    </body>
</html>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script>
	// Create a chart
	var ctx = document.getElementById('salesChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June'],
			datasets: [{
				label: 'Sales',
				data: [1000, 2000, 1500, 3000, 2500, 4000],
				borderColor: 'rgb(255, 99, 132)',
				fill: false
			}]
		}
	});
	
	// Add event listeners to the sidebar menu items
	var sidebarItems = document.querySelectorAll('.sidebar-nav a');
	sidebarItems.forEach(function(item) {
		item.addEventListener('click', function() {
			// Remove the "active" class from all items
			sidebarItems.forEach(function(item) {
				item.classList.remove('active');
			});
			
			// Add the "active" class to the clicked item
			item.classList.add('active');
		});
	});
</script>
