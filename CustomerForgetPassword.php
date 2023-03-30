<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Forget Password</title>
    </head>
    <body>
        <?php
            include './Shared/PHP/Header.php';
        ?>
        
        <form action="#">
            <div class="row m-5">
                
                <!-- Make div center -->
                <div class="col-2"></div>
                
                <div class="col-8 text-center shadow-lg">
                    
                    <div class="row">
                        <div class="col-12 fs-3 primary-color m-2">Forget Password</div>

                        <!-- Email input position-->
                        <div class="col-4 primary-color mt-2 mb-2 fs-5"><label for="email">Email : </label></div>
                        <div class="col-8 mt-2 mb-2"><input type="email" class="form-control" id="email" placeholder="123@abc.com" maxlength="40"></div>
                    
                        <div class="col-12 primary-color">Submit your email, we will send reset password pin to you.</div>
                        
                        <div class="col-8 mt-2 mb-2"></div>
                        <div class="col-4 mt-2 mb-2 "><input type="Submit" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Submit"></div>
                    </div>
                </div>
                
                <!-- Make div center -->
                <div class="col-2"></div>
            </div>
        </form>
        <?php
            include './Shared/PHP/Footer.php';
        ?>
    </body>
</html>
