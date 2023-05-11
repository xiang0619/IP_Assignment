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
        <link href="Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Stationary</title>
    </head>
    <body>
        <?php
        include './Shared/PHP/CustomerHeader.php';
        include('config.php');?>
        
        <div class="row m-5">
            
            <!-- Make div to center -->
            <div class="col-1"></div>
            
             <!-- Make it become sidebar -->
            <div class="col-2 offcanvas-body">
                
                
             <!-- Set list to unlisted style -->
                <ul class="list-unstyled">
                    <li><a href="?category=all">All</a></li>
            <?php
           
            
            
            $a = $dbc->prepare("select productTypeName from producttype");
            $a->execute(); //execute bind 
            $a->bind_result($category); //bind result
            while ($a->fetch()) {
               echo '<li><a href="?category='.$category.'">'.$category.'</a></li>';
            }

            
        ?>
      
                </ul>
            </div>
            
           <!-- Listed stationery product -->
            <div class="col-8 d-flex">
                
                
                <div class="row">
                    
                    
                    
                    <?php
                    
                    
                include './Shared/Helper/EncryptionHelper.php';
           
                    $category = isset($_GET['category']) ? $_GET['category'] : 'all';

                    // build the SQL query
                    if ($category == 'all') {
                      $sql = "select productID,name,status,unitPrice,image, description from product;";
                    } else {
                      $sql = "select productID,name,status,unitPrice,image, description from product p, producttype pt  WHERE p.productTypeID=pt.productTypeID AND pt.productTypeName = '{$category}'";
                    }
           
                    
                    
                    
                    
            include './class/Product.php';
//            include('config.php');
            $stmt = $dbc->prepare($sql);
            $stmt->execute(); //execute bind 
            $stmt->bind_result($id,$name,$status,$unitPrice,$image,$description,); //bind result
            while ($stmt->fetch()) {
                        $product = new Product();
                        $product->setId($id);
                        $product->setName($name);
                        $product->setStatus($status);
                        $product->setUnitPrice($unitPrice);     
                        
                        
                        $encryptionHelper = new EncryptionHelper("id");
                        $eid= $encryptionHelper->encrypt($product->getId());
                        
                        
                        echo '
                    
                    <!-- One col(column) for each stationery product-->
                    <div class="col">
                        <div class="card m-2" style="width: 16rem; height:30rem">
                            <img src="Shared/Image/'.$image.'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$product->getName().'</h5>
                                <p class="card-text">'.$description.'</p>
                                <a href="./Stationary_Details.php?id='.$eid.'" class="btn btn-primary">Product Detail</a>
                            </div>
                        </div>
                        </div>
                    ';

            }?>
                    
<!--                     Make it contribute a row place 
                    <div class="col w-100 mt-3">
                        
                    <nav aria-label="Page navigation example">
                        
                         Allocated pagination icon to right side 
                        <ul class="pagination justify-content-end">
                            
                             List page, previous and next button 
                            <li class="page-item"><a class="page-link primary-color" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link primary-color" href="#">1</a></li>
                            <li class="page-item"><a class="page-link primary-color" href="#">2</a></li>
                            <li class="page-item"><a class="page-link primary-color" href="#">3</a></li>
                            <li class="page-item"><a class="page-link primary-color" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>-->
                </div>
            </div>
            
            <!-- Make div to center -->
            <div class="col-1"></div>
        </div>
        
        <?php
            include './Shared/PHP/CustomerFooter.php';
        ?>
    </body>
</html>