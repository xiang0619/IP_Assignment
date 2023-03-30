<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Profile</title>
    </head>
    <body>
        <?php
            include '../Shared/PHP/Header.php';
        ?>
        
        <div class="row">
            
            <!-- Make div center -->
            <div class="col-3"></div>
            
            <div class="col-6 shadow-lg text-center m-5">
                <div class="row">
                    <!-- Icon position -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people-fill primary-color col-12 m-0" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>

                    <div class="col-12 primary-color fs-3">Profile</div>
                    
                    <div class="col-4 fs-5 primary-color mt-2 mb-2">Email : </div>
                    <div class="col-8 fs-5 primary-color mt-2 mb-2">ABC123@gmail.com</div>
                    
                    <div class="col-4 fs-5 primary-color mt-2 mb-2">Name : </div>
                    <div class="col-8 fs-5 primary-color mt-2 mb-2"></div>
                    
                    <div class="col-4 fs-5 primary-color mt-2 mb-2">Mobile Number : </div>
                    <div class="col-8 fs-5 primary-color mt-2 mb-2">012-345678910</div>
                    
                    <div class="col-4 mt-2 mb-2"><a href="Change_Password.php" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;">Change Password</a></div>
                    <div class="col-4 mt-2 mb-2"></div>
                    <div class="col-4 mt-2 mb-2 "><a href="Edit_Profile.php" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;">Edit Profile</a></div>
                </div>
            </div>
            
            <!-- Make div center -->
            <div class="col-3"></div>
            
        </div>
        
        <?php
            include '../Shared/PHP/Footer.php';
        ?>
    </body>
</html>
