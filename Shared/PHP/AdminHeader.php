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
        <link href="../CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>

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

            a {
                text-decoration: none;
            }
        </style>
    </head>
    <header>
        <div class="sticky-top">
            <nav class="navbar navbar-dark bg-dark sticky-top">
                <div class="container-fluid">           
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <ul class="nav justify-content-center">          
                        <li class="nav-item">
                            <a class="nav-link" id="adminProduct1" href="AdminProduct.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="adminService1" href="AdminService.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="adminReport1" href="AdminReport.php">Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="adminStaff" href="AdminStaff.php">Staff</a>
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
                                    <a class="nav-link" aria-current="page" id="adminDashboard" href="AdminHome.php">Dashboard</a>
                                </li>
                                <hr class="bg-dark border-1 border-top border-light">
                                <li class="nav-item">
                                    <a class="nav-link" id="adminProduct2" href="AdminProduct.php">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="adminService2"  href="AdminService.php">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="adminReport2" href="AdminReport.php">Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="adminStaff1" href="AdminStaff.php">Staff</a>
                                </li> 
                                <hr class="bg-dark border-1 border-top border-light">
                                <li class="nav-item">
                                    <a class="nav-link" id="adminProfile" href="AdminProfile.php">Profile</a>
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
    </header>
</html>
