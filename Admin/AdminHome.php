<?php
require_once '../Shared/DesignPattern/AdminProductFacade.php';
require_once '../Shared/DesignPattern/AdminServiceFacade.php';

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
$facadeS = new AdminServiceFacade($pdo);
$productTypeNames = $facade->retrieveProductTypes();
$noOfCustomer = $facade->getNoOfCustomer();
$orders = $facade->retrieveAllOrders();
$totalSales = $facade->totalSales();

?>
<!DOCTYPE html>
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
            
            #adminProduct1, #adminService1, #adminReport1,#adminStaff{
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
					<div class="card-header bg-info">
						<h5 class="card-title">Sales</h5>
					</div>
					<div class="card-body">
						<h1>RM <?php echo $totalSales ?></h1>
						
					</div>
				</div>
				
				<div class="card">
					<div class="card-header bg-success">
                                            <h5 class="card-title">Users</h5>
                                            				</div>
				<div class="card-body">
					<h1><?php echo $noOfCustomer ?></h1>
					
				</div>
			</div>
			
			<div class="card mt-3">
				<div class="card-header bg-danger">
					<h5 class="card-title">Categories</h5>
				</div>
				<div class="card-body">
					<ul class="list-group">
						<?php foreach ($productTypeNames as $productType) { ?>
                                                    <li class="list-group-item"><?php echo $productType['productTypeName']; ?></li>
                                                <?php } ?>						
					</ul>
				</div>
			</div>
		</div>
		
		<div class="col-lg-9">
			<div class="card mb-3">
				<div class="card-header bg-warning">
					<h5 class="card-title">Recent Orders</h5>
				</div>
				<div class="card-body" style="height: 425px;">
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
							<?php foreach ($orders as $order) {
                                                            if (!empty($order['paymentID'])) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $order['paymentID']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        $customerName = $facadeS->retrieveCustomerName($order['customerID']);
                                                                        echo $customerName['customerName'];
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $order['paymentDate']; ?></td>
                                                                    <td>RM <?php echo $order['totalPayment']; ?></td>
                                                                </tr>
                                                            <?php }
                                                        } ?>
						</tbody>
					</table>
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

