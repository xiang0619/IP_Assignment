<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
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
            
            #adminProfile {
                color:white;
            }
        </style>
    </head>
    <body>
        <?php
            require '../Shared/Database/StaffDatabase.php';
            //到时候就是从session那边那data
            //todo: Ng Wen Xiang get id from session
            
            $staffDatabase = new StaffDatabase();
            $staff = $staffDatabase->getProfile("jcyMiBKoHb1EYUTrTg+QdsFySTEE0EjVFf+ae5stzQA=");
            include '../Shared/PHP/AdminHeader.php';
        ?>
               
        <form action="../Validation/AdminEditProfile.php" method="post">
        <div class="row">
            
            <!-- Make div center -->
            <div class="col-3"></div>
            
            <div class="col-6 shadow-lg text-center m-5">
                <div class="row">
                    <!-- Icon position -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people-fill col-12 m-0" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>

                    <div class="col-12 fs-3">Profile</div>
                    
                    <div class="col-4 fs-5 mt-2 mb-2">Email : </div>
                    <div class="col-8 fs-5 mt-2 mb-2"><?php echo $staff->getEmail(); ?></div>
                    
                    <div class="col-4 fs-5 mt-2 mb-2">Position : </div>
                    <div class="col-8 fs-5 mt-2 mb-2"><?php echo $staff->getPosition(); ?></div>
                    
                    <div class="col-4 fs-5 mt-2 mb-2">Name : </div>
                    <div class="col-8 fs-5 mt-2 mb-2"><input type="text" name="name" class="form-control" id="name" value="<?php echo $staff->getName() ?>" maxlength="40"></div>

                    <div class="col-4 fs-5 mt-2 mb-2"><label for="mobile">Mobile Number : </label></div>
                    <div class="col-8 fs-5 mt-2 mb-2"><input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $staff->getMobile()?>" placeholder="012-345678910" maxlength="40"></div>
                    
                    <div class="col-4 mt-2 mb-2"><button class="form-control" style="border-radius: 25px;background-color: none;"><a style="text-decoration: none;color:black;" href="AdminProfile.php">Back To Profile</a></div>
                    <div class="col-4 mt-2 mb-2"></div>
                    <div class="col-4 mt-2 mb-2 "><input type="Submit" class="form-control" name="submit" style=" border-radius: 25px;background-color: none;" value="Edit"></div>
                </div>
            </div>
            
            <!-- Make div center -->
            <div class="col-3"></div>
            
        </div>
        </form>
    </body>
</html>
