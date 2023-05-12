

<!DOCTYPE html>
<!--Author: Jason Lee Kar Chun -->
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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

            #adminStaff {
                color: lightsteelblue;
            }

            #adminStaff2 {
                color: white;
            }

            #adminService1, #adminReport1,#adminProduct1{
                color:white;
            }
        </style>
    </head>
    <?php
    include '../Shared/PHP/AdminHeader.php';
    include '../Shared/errorPage.php';
    include '../Shared/DesignPattern/StaffFactoryMethod.php';

    $staffID = $_GET['id'];

    $servername = 'localhost';
    $username = 'root';
    $serverPassword = '';
    $dbname = 'ip';
// Create connection
    $conn = mysqli_connect($servername, $username, $serverPassword, $dbname);

// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("SELECT * FROM staff WHERE ID = ?");
    $stmt->bind_param("s", $staffID);
    $stmt->execute();
    $result = $stmt->get_result();
    $staff = $result->fetch_assoc();

    $newID = $staff["ID"];
    $newName = $staff["name"];
    $newEmail = $staff["email"];
    $newStatus = $staff["status"];
    $newPosition = $staff["position"];
    $newMobile = $staff["mobile"];
    $newUpdateID = $staff["updatedID"];
    $newUpdateDate = $staff["updatedDate"];
    $newCreatedID = $staff["createdID"];
    $newCreatedDate = $staff["createdDate"];
    $newPassword = $staff["password"];

// Load the XML file and locate the element to update
    $xmlDoc = new DOMDocument();
    $xmlDoc->load('xml/AdminStaff.xml');
    $productElement = $xmlDoc->getElementsByTagName('Staff')->item(0);

// Update the value of each child element
    $productElement->getElementsByTagName('id')->item(0)->nodeValue = $newID;
    $productElement->getElementsByTagName('email')->item(0)->nodeValue = $newName;
    $productElement->getElementsByTagName('name')->item(0)->nodeValue = $newEmail;
    $productElement->getElementsByTagName('password')->item(0)->nodeValue = $newPassword;
    $productElement->getElementsByTagName('mobile')->item(0)->nodeValue = $newMobile;
    $productElement->getElementsByTagName('status')->item(0)->nodeValue = $newStatus;
    $productElement->getElementsByTagName('position')->item(0)->nodeValue = $newPosition;
    $productElement->getElementsByTagName('updatedID')->item(0)->nodeValue = $newUpdateID;
    $productElement->getElementsByTagName('updatedDate')->item(0)->nodeValue = $newUpdateDate;
    $productElement->getElementsByTagName('createdID')->item(0)->nodeValue = $newCreatedID;
    $productElement->getElementsByTagName('createdDate')->item(0)->nodeValue = $newCreatedDate;

// Save the updated XML document to disk
    $xmlDoc->save('./xml/AdminStaff.xml');

// Load the XML file
    $xml = simplexml_load_file('./xml/AdminStaff.xml');
    $id = $xml->Staff->id;
    ?>
    <body>
        <!-- Main Content Area -->
        <div>
            <main class="container-fluid mb-4 mt-4 text-center" style="">
                <h1>Staffs</h1>
            </main>

            <main class="container mx-auto mt-5 mb-5" style="max-width: 600px;">
                <div class="card border rounded-3">
                    <div class="card-header text-center">
                        <h4>Delete Staff</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="AdminStaffDeleteFunction.php?id=<?php echo $xml->Staff->id; ?>">
                            <div class="table-responsive">
                                <table class="table table-hover mx-auto" style="max-width: 600px;">
                                    <tbody>
                                        <tr>
                                            <td class="bg-light" colspan="2" style="text-align: center;"><i class="fas fa-user" style="font-size: 8em; color: black;"></i></td>
                                        </tr>               
                                        <tr>
                                            <th class="bg-dark text-light">ID</th>
                                            <td class="bg-light"><?php echo $xml->Staff->id; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light text-dark">Email</th>
                                            <td class="bg-light"><?php echo $xml->Staff->email; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-dark text-light">Status</th>
                                            <td class="bg-light"><?php echo $xml->Staff->status; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light text-dark">Position</th>
                                            <td class="bg-light"><?php echo $xml->Staff->position; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-dark text-light">Mobile Number</th>
                                            <td class="bg-light"><?php echo $xml->Staff->mobile; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light text-dark">Updated ID</th>
                                            <td class="bg-light"><?php echo $xml->Staff->updatedID; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-dark text-light">Updated Date</th>
                                            <td class="bg-light"><?php echo $xml->Staff->updatedDate; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light text-dark">Created ID</th>
                                            <td class="bg-light"><?php echo $xml->Staff->createdID; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-dark text-light">Created Date</th>
                                            <td class="bg-light"><?php echo $xml->Staff->createdDate; ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"  onclick="window.location.href = 'AdminStaff.php'">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
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


