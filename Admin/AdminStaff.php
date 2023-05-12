<!DOCTYPE html>
<!--Author: Jason Lee Kar Chun -->
<?php
include "./AdminStaffRetrieve.php";
$xslFile = "./xsl/AdminStaff.xsl";

// Apply the XSLT stylesheet to the XML data
$xslt = new XSLTProcessor();
$xsldoc = new DOMDocument();
$xsldoc->load($xslFile);
$xslt->importStylesheet($xsldoc);
$html = $xslt->transformToXML($xml);
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

            body{
                background-color: white;
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
    <body>
        <?php
        include '../Shared/PHP/AdminHeader.php';
        ?>
        <!-- Main Content Area -->
        <div>
            <main class="container-fluid mb-4 mt-4 text-center" style="">
                <h1>Staffs</h1>
            </main>
            <main class="container-fluid">
                <div class="mb-4">
                    <button class="btn btn-primary"><a href="AdminStaffAdd.php" class="text-light">Add Staff</a></button>
                </div>

                <div class="mb-3">
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
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Position</th>
                                    <th>Mobile</th>
                                    <th>Updated ID</th>
                                    <th>Updated Date</th>
                                    <th>Created ID</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody id="search-results" class="table-light"></tbody>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add event listener to search form
    document.getElementById('search-form').addEventListener('submit', function (event) {
        // Prevent default form submission
        event.preventDefault();

        // Get search query from input field
        var searchQuery = document.getElementById('search-input').value;

        // Send AJAX request to search API
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://localhost/IP_Assignment/Admin/api/AdminStaffSearch.php?q=' + encodeURIComponent(searchQuery));
        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById("products-container1").style.display = "none";
                document.getElementById("products-container").style.display = "block";
                // Parse JSON response and render search results
                var searchResults = JSON.parse(xhr.responseText);
                var html = '';
//                for (var i = 0; i < searchResults.length; i++) {
//                    html += '<div>' +
//                            '<p>ID: ' + searchResults[i].ID + '</p>'+
//                            '<p>Name: ' + searchResults[i].name + '</p>' +
//                            '<p>Email: ' + searchResults[i].email + '</p>' +
//                            '</div>';
//                }
                for (var i = 0; i < searchResults.length; i++) {
                    html += '<tr>' +
                            '<td><button class="btn btn-success me-2"><a href="AdminStaffEdit.php?id=' + searchResults[i].ID + '" class="text-white">Edit</a></button>' +
                            '<button class="btn btn-danger"><a href="AdminStaffDelete.php?id=' + searchResults[i].ID + '" class="text-white">Delete</a></button></td>' +
                            '<td>' + searchResults[i].ID + '</td>' +
                            '<td><a href="AdminStaffDetail.php?id=' + searchResults[i].ID + '" class="text-dark">' + searchResults[i].name + '</a></td>' +
                            '<td>' + searchResults[i].email + '</td>' +
                            '<td>' + searchResults[i].status + '</td>' +
                            '<td>' + searchResults[i].position + '</td>' +
                            '<td>' + searchResults[i].mobile + '</td>' +
                            '<td>' + searchResults[i].updatedID + '</td>' +
                            '<td>' + searchResults[i].updatedDate + '</td>' +
                            '<td>' + searchResults[i].createdID + '</td>' +
                            '<td>' + searchResults[i].createdDate + '</td>' +
                            '</tr>';
                }

                document.getElementById('search-results').innerHTML = html;
            } else {
                console.log('Request failed.  Returned status of ' + xhr.status);
            }
        };
        xhr.send();
    });
</script>


