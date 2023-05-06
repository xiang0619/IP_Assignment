<?php




   
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include './Shared/PHP/Header.php';
            include './class/Product.php';
            include('config.php');
            $stmt = $dbc->prepare("SELECT productID,name,quantity,status,unitPrice,image,description from product where productID ='P0001'");
            $stmt->execute(); //execute bind 
            $stmt->bind_result($id,$name,$quantity,$status,$unitPrice,$image,$description,); //bind result
            while ($stmt->fetch()) {
                        $product = new Product();
                        $product->setId($id);
                        $product->setName($name);
                        $product->setStatus($status);
                        $product->setUnitPrice($unitPrice);     
                        $product->setQuantity($quantity);
                        
                        
            }
            
            echo '<div class="row m-5 ">
            
            <!-- Make div to center-->
            <div class="col-1"></div>
            
            <!-- Product description -->
            <div class="col-10 shadow">
                
                <div class="row m-2">
                    
                    <!-- Contribute 5/12 in a row, image position -->
                    <div class="col-5">
                        <img src='.$image.' class="rounded float-start w-100 shadow" alt=""/>
                    </div>
                    
                    <!-- Contribute 7/12 in a row, description position -->
                    <div class="col-7">
                        
                        <!-- Product name position -->
                        <div class="fs-3 primary-color">
                            '.$product->getName().'
                        </div>
                        
                        <!-- Next line-->
                        <br>
                        
                        <!-- Product price position -->
                        <div class="fs-4 primary-color">
                            RM '.$product->getUnitPrice().'
                        </div>
                        
                        <!-- Product quantity for buy and availability position -->
                        <div class="fs-4 primary-color mt-2">
                            
                            <!-- Product quantity for buy -->
                            <label for="quantity">Quantity : </label>
                            <input class="ms-2" type="number" value="1" id="quantity" name="quantity" min="1" max="20">
                            
                            <!-- Product available piece-->
                            <p class="fs-5">'.$product->getQuantity().' piece Available</p>
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
                            
                            
                            <p>'.$description.'</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Make div to center-->
            <div class="col-1"></div>
        </div>'
    
            
        ?>
        
        
        
        <?php
            include './Shared/PHP/Footer.php';
        ?>
    </body>
</html>
