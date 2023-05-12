

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js"></script>


        <title>Service</title>
    </head>
    <body>
        <?php
            include './Shared/PHP/CustomerHeader.php';
        ?>
        
        <form action="./add_cart.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="productid" value=-1>
            <input type="hidden" name="quantity" value=-1>
                <input type="hidden" name="type" value="service">
                <input type="hidden" name="addCart" value="the printing service is added, the service process will be proceed when you finish the payment.">
                <input type="hidden" name="doubleAdd" value="the file you try to upload already in your cart, please dont double add to cart">
                
            <div class="col-1"></div>
            <div class="col-6">
                <h3>Printing Service</h3>
            </div>
            
            
            <div class="row m-5">
                
                <!-- Make div to center-->
                <div class="col-1"></div>
                
                    <!-- Service position -->
                    <div class="col-10">
                        
                            
                        
                        <div class="row mb-6 shadow-lg mt-5">
                            <div class="col 6">
                                <iframe id="pdf_viewer" style="margin: 10px" width="500" height="300"></iframe>
                            </div>
                            <div class="col 6 drag-area text-center lg primary-color mt-5" style="height:150px">
                                <input type="file" accept="application/pdf" id="pdf_file" name="pdf_file" onchange="loadPDF()">
                                
                                <script>
                                    function loadPDF() {
                                      // Get the selected file
                                      var file = document.getElementById("pdf_file").files[0];

                                      // Create a URL for the selected file
                                      var fileURL = URL.createObjectURL(file);

                                      // Set the src attribute of the iframe to the file URL
                                      document.getElementById("pdf_viewer").src = fileURL;

                                      pdfjsLib.getDocument(fileURL).promise.then(function(pdf) {
                                            var numPages = pdf.numPages;

                                            // Display the number of pages
                                            document.getElementById("pdf_info").innerHTML = 'Total : RM'+(numPages*0.10);
                                          });
                                    }
                                    </script>
                            </div>
                            <div class="col-6 fs-3 primary-color">
                             <p id="pdf_info" name="pdf_info"></p>
                            </div>
                            <!-- Make submit button to right-->
                            <div class="col-7 fs-3 primary-color"></div>
                            
                            <!-- Submit button position-->
                            <div class="col-3 text-end mb-2"><input type="submit" name="submit" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Add to Cart"></div>
                            
                        </div>
                    </div>

                
                <!-- Make div to center-->
                <div class="col-1"></div>
            </div>
        </form>
        
        
        <?php
            include './Shared/PHP/CustomerFooter.php';
        ?>
    </body>
</html>
