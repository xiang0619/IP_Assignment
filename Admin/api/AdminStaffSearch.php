<?php

$servername = 'localhost';
$username = 'root';
$serverPassword = '';
$dbname = 'ip';
// Connect to database
 $conn = mysqli_connect($servername, $username, $serverPassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get search query from request
$searchQuery = $_GET["q"];

// Build SQL query to search for staff members by name
$sql = "SELECT * FROM staff WHERE name LIKE '%" . $searchQuery . "%'";

// Execute SQL query and get results
$result = mysqli_query($conn, $sql);

// Return results as JSON
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
echo json_encode($rows);

// Close database connection
mysqli_close($conn);

