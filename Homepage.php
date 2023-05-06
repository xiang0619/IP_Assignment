<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <link rel="shortcut icon" type="image/png" sizes="16x16" href="Shared/Image/b0b8203f-68d2-47f6-a397-269a9aa1f618.png"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            include './Shared/PHP/Header.php';
        ?>
        
        <!-- Stationery and Service link position-->
        <div class="row m-5">
            <div class="col ms-5 me-5">
                <div class="row">
                    
                    <!-- Make div to center-->
                    <div class="col-2"></div>
                    
                    <!-- Stationery link position -->
                    <div class="col-4">
                        <a href="#" title="Stationery" class="container w-60">
                            <img class="image" width="400px" src="Shared/Image/_107080905_gettyimages-654239286.jpg">
                            <div class="overlay">
                                <div class="primary-color fs-2 text">Stationery</div>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Service link position -->
                    <div class="col-4">
                        <a href="#" title="Service" class="container w-80">
                            <img class="image" width="400px" src="Shared/Image/Canon-printer-repair-malaysia-1024x576.jpg">
                            <div class="overlay">
                                <div class="primary-color fs-2 text">Service</div>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Make div to center-->
                    <div class="col-2"></div>
                </div>
            </div>
        </div>
        
        <!-- Tape title -->
        <div class="fs-3 ms-5">Tape</div>
        
        <div class="row m-5">
            
            <!-- One col(column) for each stationery product-->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="Shared/Image/tape1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Yellow Tape</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <!-- One col(column) for each stationery product-->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="Shared/Image/tape2.jpg" class="card-img-top " alt="...">
                    <div class="card-body">
                        <h5 class="card-title">White Tape</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <!-- One col(column) for each stationery product-->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="Shared/Image/tape3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Black Tape</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <!-- One col(column) for each stationery product-->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="Shared/Image/tape4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">White Tape</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Pencil title -->
        <div class="fs-3 ms-5">Pencil</div>
        
        <div class="row m-5">
            
            <!-- One col(column) for each stationery product-->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="Shared/Image/pencil1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Yellow Pencil</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <!-- One col(column) for each stationery product-->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="Shared/Image/pencil2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Red Pencil</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <!-- One col(column) for each stationery product-->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="Shared/Image/pencil3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Black Pencil</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            
            <!-- One col(column) for each stationery product-->
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="Shared/Image/pencil4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Blue Pencil</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            include './Shared/PHP/Footer.php';
        ?>
    </body>
</html>
