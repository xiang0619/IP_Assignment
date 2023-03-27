<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include './Shared/PHP/Header.php';
        ?>
        
        <div class="row m-5">
            
            <!-- Make div to center -->
            <div class="col-2"></div>
            
            <!-- register form position -->
            <div class="col-8  shadow-lg">
                <form action="action">
                    
                    <div class="row">
                        <!-- Email input position-->
                        
                        <!-- Login word position -->
                            <div class="col-12 fs-3 primary-color m-2 text-center">Register</div>
                            
                        <!-- Icon position -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people-fill primary-color col-12 m-0" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>
                        
                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="email">Email : </label></div>
                        <div class="col-6 mt-2 mb-2"><input type="email" class="form-control" id="email" placeholder="123@abc.com" maxlength="40"></div>
                        <div class="col-1"></div>


                        <!-- Name input position-->
                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="name">Name : </label></div>
                        <div class="col-6 mt-2 mb-2"><input class="form-control" type="text" id="name" placeholder="Cheah Wen Xian" maxlength="40"></div>
                        <div class="col-1"></div>

                        <!-- Mobile input position -->
                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="mobile">Mobile Number : </label></div>
                        <div class="col-6 mt-2 mb-2"><input class="form-control" width="100" type="text" id="mobile" placeholder="011-3610 6802" maxlength="25"></div>
                        <div class="col-1"></div>

                        <!-- Password input position -->
                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="password">Password : </label></div>
                        <div class="col-6 mt-2 mb-2"><input class="form-control" width="100" type="password" id="password" placeholder="********" maxlength="40"></div>
                        <div class="col-1"></div>

                        <!-- Re-Password input position -->
                        <div class="col-1"></div>
                        <div class="col-4 primary-color mt-2 mb-2"><label for="re-password">Confirm Password : </label></div>
                        <div class="col-6 mt-2 mb-2"><input class="form-control" width="100" type="password" id="re-password" placeholder="********" maxlength="40"></div>
                        <div class="col-1"></div>

                        <!--Submit button position  -->
                        <div class="col-8 mt-2 mb-2"></div>
                        <div class="col-4 mt-2 mb-2 "><input class="form-control" type="Submit" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Submit"></div>
                    </div>
                    
                </form>
            </div>
            
            <!-- Make div to center -->
            <div class="col-2"></div>
        </div>
        
        <?php
            include './Shared/PHP/Footer.php';
        ?>
    </body>
</html>
