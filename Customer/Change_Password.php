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
        <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>s
        <title></title>
    </head>
    <body>
        <?php
            include '../Shared/PHP/Header.php';
        ?>
        
        <form action="#">
            <div class="row">
                <!-- Make div center -->
                <div class="col-3"></div>

                <div class="col-6 shadow-lg text-center m-5">
                    <div class="row">
                        <!-- Icon position -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-shield-lock-fill primary-color col-12 m-0 mt-4" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
                        </svg>

                        <div class="col-12 primary-color fs-3">Change Password</div>

                        <div class="col-4 fs-5 primary-color mt-2 mb-2"><label for="oldPassword">Old Password : </label></div>
                        <div class="col-8 fs-5 primary-color mt-2 mb-2"><input type="password" class="form-control" id="oldPassword" placeholder="**********" maxlength="40"></div>

                        <div class="col-4 fs-5 primary-color mt-2 mb-2"><label for="newPassword">New Password : </label></div>
                        <div class="col-8 fs-5 primary-color mt-2 mb-2"><input type="password" class="form-control" id="newPassword" placeholder="**********" maxlength="40"></div>

                        <div class="col-4 fs-5 primary-color mt-2 mb-2"><label for="rePassword">Retype Password : </label></div>
                        <div class="col-8 fs-5 primary-color mt-2 mb-2"><input type="password" class="form-control" id="rePassword" placeholder="**********" maxlength="40"></div>s

                        <!--Edit button position  -->
                        <div class="col-8 mt-2 mb-2"></div>
                        <div class="col-4 mt-2 mb-2 "><input type="Submit" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Change Password"></div>
                    </div>
                </div>

                <!-- Make div center -->
                <div class="col-3"></div>

            </div>
        </form>
        
        
        <?php
            include '../Shared/PHP/Footer.php';
        ?>
    </body>
</html>
