<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
        <title>Service</title>
    </head>
    <body>
        <?php
            include './Shared/PHP/Header.php';
        ?>
        <form action="">
            
            
            <div class="row m-5">
                
                <!-- Make div to center-->
                <div class="col-1"></div>
                
                    <!-- Service position -->
                    <div class="col-10">
                        <div class="row mb-4 shadow-lg mt-5">
                            <div class="col drag-area text-center lg primary-color mt-5" style="height:150px">
                                <input type="file" accept="application/pdf"  id="inputPDF">
                            </div>
                            
                            <!-- Make submit button to right-->
                            <div class="col-10 fs-3 primary-color"></div>
                            
                            <!-- Submit button position-->
                            <div class="col-2 text-end mb-2"><input type="Submit" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Submit"></div>
                        </div>
                    </div>
                
                <!-- Make div to center-->
                <div class="col-1"></div>
            </div>
        </form>
        <?php
            include './Shared/PHP/Footer.php';
        ?>
    </body>
</html>
