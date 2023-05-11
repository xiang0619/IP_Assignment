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
            
            #adminDashboard {
                color:white;
            }
            
            #adminProduct1, #adminService1, #adminReport1{
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
