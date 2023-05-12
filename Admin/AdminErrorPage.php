<!DOCTYPE html>
<html>
    <!-- author:Chin Kah Seng -->
<head>
	<title>Error Page</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}

		.container {
			margin: 100px auto;
			width: 50%;
			background-color: #fff;
			padding: 20px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.3);
			text-align: center;
		}

		h1 {
			color: #e60000;
			font-size: 36px;
			margin-top: 0;
		}

		p {
			font-size: 18px;
			margin-bottom: 20px;
		}

		.btn {
			display: inline-block;
			background-color: #e60000;
			color: #fff;
			padding: 10px 20px;
			border-radius: 5px;
			text-decoration: none;
			transition: all 0.3s ease;
		}

		.btn:hover {
			background-color: #ff4d4d;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Oops! Something went wrong.</h1>
		<p>We're sorry, but an error has occurred. Please try again later.</p>
		<a href="AdminHome.php" class="btn">Go Back</a>
	</div>
</body>
</html>
