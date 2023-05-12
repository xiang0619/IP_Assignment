<!--Author: ONG ENG HUAT-->
<?php?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Stationary Detail</title>
        
    </head>
    <body>
        
        <?php
include './Shared/Helper/EncryptionHelper.php'; 

//data decrypt
            //var userid = '<?php echo $_SESSION['id'];?/>

            $id = $_GET['id'];

            $encryptionHelper = new EncryptionHelper("id");

            //decrypt id 
            $did= $encryptionHelper->decrypt($id);


include './Shared/PHP/CustomerHeader.php';
            include './class/Product.php';
            include('config.php');
            $stmt = $dbc->prepare("SELECT productID,name,quantity,status,unitPrice,image,description from product where productID = ?");
            $stmt->bind_param('s',  $did);
            $stmt->execute(); //execute bind 
            $stmt->bind_result($id,$name,$quantity,$status,$unitPrice,$image,$description,); //bind result
            $product = new Product();
            while ($stmt->fetch()) {
                        
                        $product->setId($id);
                        $product->setName($name);
                        $product->setStatus($status);
                        $product->setUnitPrice($unitPrice);     
                        $product->setQuantity($quantity);
                        $product->setImage($image);
                        $product->setDescription($description);
                        
                        
            }
            $stmt->close(); 
            
            if($product!=null){
                echo '
                
            <form action="./add_cart.php" method="post">
            <input type="hidden" name="productid" value='.$product->getId().'>
                <input type="hidden" name="test" value='.$did.'>
                <input type="hidden" name="type" value="product">
                <input type="hidden" name="addCart" value="the product is added to your cart.">
                <input type="hidden" name="doubleAdd" value="Double add to cart detected, increase the cart value.">


            <div class="row m-5 ">
            
            <!-- Make div to center-->
            <div class="col-1"></div>
            
            <!-- Product description -->
            <div class="col-10 shadow">
                
                <div class="row m-2">
                    
                    <!-- Contribute 5/12 in a row, image position -->
                    <div class="col-5">
                    
                        <img src=./Shared/Image/'.$product->getImage().' class="rounded float-start w-100 shadow" alt=""/>
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
                            <input type="submit" name="submit" value="Add To Cart" class="primary-color shadow p-2 rounded" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill icon-size" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg></input>
                           


                        </div>
                        
                        <!-- Description position -->
                        <div class="fs-5 primary-color mt-5">
                            
                            <!-- Description title -->
                            <h5>Description</h5>
                            
                            
                            <p>'.$product->getDescription().'</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Make div to center-->
            <div class="col-1"></div>
        </div>
        
        </form>';
            }
            else
            {
                echo 'error ';
            }

                
            
    
            
?>
        
        <?php
            include './Shared/PHP/CustomerFooter.php';
        ?>
    </body>
</html>
