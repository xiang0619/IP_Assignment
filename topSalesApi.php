<?php
require_once './topSalesData.php';
include 'config.php';
include './Shared/Helper/EncryptionHelper.php';
$list= getData($dbc);

if(empty($list)){
    echo("Empty Data");
}
else
{   
        

        echo '<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Stationary</title>
    </head>
    <body>';
        include './Shared/PHP/CustomerHeader.php';
        echo '<h3>The most Sales Product </h3>'
    . '</body></html>';
        
        echo '<div class="row m-5">
            
            <!-- Make div to center -->
            <div class="col-1"></div>
            
             <!-- Make it become sidebar -->
            <div class="col-2 offcanvas-body">
                
                
             <!-- Set list to unlisted style -->
                <ul class="list-unstyled">
                    <li><a href="./Stationary.php?category=all">All</a></li>
                    <li><a href="./topSalesApi.php">Highest Sales</a></li>';
        
        
        $a = $dbc->prepare("select productTypeName from producttype");
            $a->execute(); //execute bind 
            $a->bind_result($category); //bind result
            while ($a->fetch()) {
               echo '<li><a href="./Stationary.php?category='.$category.'">'.$category.'</a></li>';
            }

             $a->close();
        
             echo '</ul>
            </div>';
             
        foreach($list as $item){
                            $encryptionHelper = new EncryptionHelper("id");
                        $eid= $encryptionHelper->encrypt($item->getId());
                            echo'<!-- One col(column) for each stationery product-->
                    <div class="col">
                        <div class="card m-2" style="width: 16rem; height:30rem">
                            <img src="Shared/Image/'.$item->getImage().'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$item->getName().'</h5>
                                <p class="card-text">'.$item->getDescription().'</p>
                                <a href="./Stationary_Details.php?id='.$eid.'" class="btn btn-primary">Product Detail</a>
                            </div>
                        </div>
                        </div>';
                        }
include './Shared/PHP/CustomerFooter.php';
   

}

?>
