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
            include './Shared/PHP/CustomerHeader.php';
        ?>
        
        <div class="row m-5 ">
            
            <!-- Make div to center-->
            <div class="col-1"></div>
            
            <!-- Product description -->
            <div class="col-10 shadow">
                
                <div class="row m-2">
                    
                    <!-- Contribute 5/12 in a row, image position -->
                    <div class="col-5">
                        <img src="Shared/Image/tape1.jpg" class="rounded float-start w-100 shadow" alt=""/>
                    </div>
                    
                    <!-- Contribute 7/12 in a row, description position -->
                    <div class="col-7">
                        
                        <!-- Product name position -->
                        <div class="fs-3 primary-color">
                            Blue Tape
                        </div>
                        
                        <!-- Next line-->
                        <br>
                        
                        <!-- Product price position -->
                        <div class="fs-4 primary-color">
                            RM 10.00
                        </div>
                        
                        <!-- Product quantity for buy and availability position -->
                        <div class="fs-4 primary-color mt-2">
                            
                            <!-- Product quantity for buy -->
                            <label for="quantity">Quantity : </label>
                            <input class="ms-2" type="number" value="1" id="quantity" name="quantity" min="1" max="20">
                            
                            <!-- Product available piece-->
                            <p class="fs-5">20 piece Available</p>
                        </div>
                        
                        <!-- Add to cart and buy now position -->
                        <div class="fs-5 primary-color mt-4">
                            
                            <!-- Add to cart position -->
                            <a href="#" class="primary-color shadow p-2 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill icon-size" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                Add To Cart
                            </a>
                            
                            <!-- Buy now position -->
                            <a href="#" class="primary-color shadow p-2 rounded ms-3">
                                Buy Now
                            </a>
                        </div>
                        
                        <!-- Description position -->
                        <div class="fs-5 primary-color mt-5">
                            
                            <!-- Description title -->
                            <h5>Description</h5>
                            
                            
                            <p>Blue tape is a type of masking tape that is typically blue in color. It is often used in painting projects to create clean, sharp lines where one color meets another. Blue tape is also used in other types of projects where masking is needed, such as in woodworking, metalworking, and electronic assembly.</p>
                            <p>One of the main benefits of blue tape is that it is designed to be easily removed without leaving residue or damaging the surface it was applied to. This makes it a popular choice for temporary masking applications.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Make div to center-->
            <div class="col-1"></div>
        </div>
        
        <?php
            include './Shared/PHP/CustomerFooter.php';
        ?>
    </body>
</html>
