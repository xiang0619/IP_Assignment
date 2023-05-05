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
            include './Shared/PHP/Header.php';
        ?>
        
        <div class="row m-5">
            
            <!-- Make div to center -->
            <div class="col-1"></div>
            
            <!-- Make it become sidebar -->
            <div class="col-2 offcanvas-body">
                
                <!-- Set list to unlisted style -->
                <ul class="list-unstyled">
                    
                    <!-- Listed stationery product category -->
                    <li class="m-2"><a href="#" class="fs-5 nav-link primary-color">Pencil</a></li>
                    <li class="m-2"><a href="#" class="fs-5 nav-link primary-color">Tape</a></li>
                    <li class="m-2"><a href="#" class="fs-5 nav-link primary-color">Pen</a></li>
                    <li class="m-2"><a href="#" class="fs-5 nav-link primary-color">Erase</a></li>
                    <li class="m-2"><a href="#" class="fs-5 nav-link primary-color">Paper</a></li>
                    <li class="m-2"><a href="#" class="fs-5 nav-link primary-color">Note Book</a></li>
                    <li class="m-2"><a href="#" class="fs-5 nav-link primary-color">Scissors</a></li>
                
                
                </ul>
            </div>
            
            <!-- Listed stationery product -->
            <div class="col-8 d-flex">
                
                
                <div class="row">
                    
                    <!-- One col(column) for each stationery product-->
                    <div class="col">
                        <div class="card m-2" style="width: 16rem; height:30rem">
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
                        <div class="card m-2" style="width: 16rem; height:30rem">
                            <img src="Shared/Image/tape2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">White Tape</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <!-- One col(column) for each stationery product-->
                    <div class="col">
                        <div class="card m-2" style="width: 16rem; height:30rem">
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
                        <div class="card m-2" style="width: 16rem; height:30rem">
                            <img src="Shared/Image/tape4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">White Tape</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                
                    <!-- One col(column) for each stationery product-->
                    <div class="col">
                        <div class="card m-2" style="width: 16rem; height:30rem">
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
                        <div class="card m-2" style="width: 16rem; height:30rem">
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
                        <div class="card m-2" style="width: 16rem; height:30rem">
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
                        <div class="card m-2" style="width: 16rem; height:30rem">
                            <img src="Shared/Image/pencil4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Blue Pencil</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- One col(column) for each stationery product-->
                    <div class="col">
                        <div class="card m-2" style="width: 16rem; height:30rem">
                            <img src="Shared/Image/pencil4.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Blue Pencil</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Make it contribute a row place -->
                    <div class="col w-100 mt-3">
                        
                    <nav aria-label="Page navigation example">
                        
                        <!-- Allocated pagination icon to right side -->
                        <ul class="pagination justify-content-end">
                            
                            <!-- List page, previous and next button -->
                            <li class="page-item"><a class="page-link primary-color" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link primary-color" href="#">1</a></li>
                            <li class="page-item"><a class="page-link primary-color" href="#">2</a></li>
                            <li class="page-item"><a class="page-link primary-color" href="#">3</a></li>
                            <li class="page-item"><a class="page-link primary-color" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                </div>
            </div>
            
            <!-- Make div to center -->
            <div class="col-1"></div>
        </div>
        
        <?php
            include './Shared/PHP/Footer.php';
        ?>
    </body>
</html>
