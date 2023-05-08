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
        <title>Cart</title>
    </head>
    <body>
        <?php
            include '../Shared/PHP/Header.php';
        ?>
        
        <form action="#">
            
            <div class="row m-5">


                <div class="col-12">

                    <!-- Cart header position -->
                    <div class="row shadow-sm">

                        <div class="col-6 fs-4 primary-color">Product</div>
                        <div class="col-4 fs-4 primary-color">Unit Price</div>
                        <div class="col-2 fs-4 primary-color">Quantity</div>

                    </div>

                </div>

                <!-- For each stationery have 12/12 position -->
                <div class="col-12">
                    
                    <div class="row shadow-sm">

                        <div class="col-6 fs-4 primary-color"><img src="../Shared/Image/pencil1.jpg" class="m-1" width="150px" height="150px" alt="alt"/>Pencil 1</div>
                        <div class="col-4 fs-4 primary-color m-auto">RM 20</div>
                        <div class="col-2 primary-color m-auto"><input class="ms-2" type="number" value="1" id="quantity" name="quantity" min="1" max="20"></div>

                    </div>
                </div>
                
                <!-- For each stationery have 12/12 position -->
                <div class="col-12">
                    <div class="row shadow-sm">

                        <div class="col-6 fs-4 primary-color"><img src="../Shared/Image/pencil2.jpg" class="m-1" width="150px" height="150px" alt="alt"/>Pencil 2</div>
                        <div class="col-4 fs-4 primary-color m-auto">RM 10</div>
                        <div class="col-2 primary-color m-auto"><input class="ms-2" type="number" value="1" id="quantity" name="quantity" min="1" max="20"></div>

                    </div>
                </div>
                
                <!-- For each stationery have 12/12 position -->
                <div class="col-12">
                    <div class="row shadow-sm">

                        <div class="col-6 fs-4 primary-color"><img src="../Shared/Image/pencil3.jpg" class="m-1" width="150px" height="150px" alt="alt"/>Pencil 3</div>
                        <div class="col-4 fs-4 primary-color m-auto">RM 15</div>
                        <div class="col-2 primary-color m-auto"><input class="ms-2" type="number" value="1" id="quantity" name="quantity" min="1" max="20"></div>

                    </div>
                </div>

                <!-- Check out button position -->
                <div class="col-12">
                    <div class="row shadow-sm">

                        <div class="col-9 text-end m-4 fs-4 primary-color">
                            <label for="paymentMethods">Payment Method:</label>
                        </div>
                        <div class="col-2 float-end fs-4 m-4 "> 
                            <select name="paymentMethod" id="paymentMethods">
                                <option value="visa">Visa Card</option>
                                <option value="creditCard">Credit Card</option>
                                <option value="eWallet">E-Wallet</option>
                            </select>
                        </div>
                        <div class="col-9 text-end primary-color fs-4 m-4">Total Price : RM 100</div>
                        <div class="col-2 float-end m-4"><input type="Submit" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Check Out"></div>

                    </div>
                </div>
                
            </div>
        
        </form>
            
        <?php
            include '../Shared/PHP/Footer.php';
        ?>
    </body>
</html>
