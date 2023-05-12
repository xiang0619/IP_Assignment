<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : CartView.xsl
    Created on : May 6, 2023, 6:25 PM
    Author     : huatl
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" xmlns:php="http://php.net/xsl">
    <xsl:output method="html" encoding="UTF-8"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    
    <xsl:template match="/">
    <xsl:variable name="totalPrice" select="sum(products/product/total)" />
    
        <html>
            <head>
                <meta charset="UTF-8"/>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"/>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
                <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
                <title>Cart</title>
                <script>
                function deleteCart(id,type) {
                   
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'delete_cart.php?id=' + id, true);
                    xhr.onreadystatechange = function() {
                      if (xhr.readyState === 4) { // the request is complete
                            if (xhr.status === 200) { // success
                                console.log(xhr.responseText);
                                // you can update the UI or perform any other action here
                                location.reload();
                                
                                
                            } else {
                                console.error(xhr.statusText);
                                // handle the error here
                                
                            }
                        }
                    };
                xhr.send();
                }
                    
                    function PayAll(){
                        
                    }
                    function updateDatabase(cartId, quantity) {
                      
                     console.log(cartId, quantity);
                        // Create a new AJAX request
                        var xhr = new XMLHttpRequest();

                        // Set up the request
                       xhr.open('GET', 'update_cart.php?id=' + cartId + '&amp;qty=' + quantity, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4) { // the request is complete
                              if (xhr.status === 200) { // success
                                console.log(xhr.responseText);
                                
                                // you can update the UI or perform any other action here
                                location.reload();
                              } else {
                                console.error(xhr.statusText);
                                // handle the error here
                              }
                            }
                          };

                        // Send the request
                        xhr.send();
                      }
            </script>
            </head>
            <body>
                <div class="row m-5">


                <div class="col-12">

<!--                     Cart header position -->
                    <div class="row shadow-sm">

                        <div class="col-5 fs-4 primary-color">Product/Service</div>
                        <div class="col-3 fs-4 primary-color">Unit Price</div>
                        <div class="col-2 fs-4 primary-color">Quantity</div>
                        <div class="col-2 fs-4 primary-color">Drop</div>

                    </div>

                </div>

                <!-- For each stationery have 12/12 position -->
                <div class="col-12">
                    
                    <xsl:for-each select="products/product">
                        
                        <div class="row shadow-sm">

                        <div class="col-5 fs-4 primary-color"><img src="./Shared/Image/{productImage}" class="m-1" width="150px" height="150px" alt="alt"/><xsl:value-of select="name"/></div>
                        <div class="col-3 fs-4 primary-color m-auto">RM <xsl:value-of select="productPrice"/></div>
                        <div class="col-2 primary-color m-auto">
                            
                            
                                <input type="number" min="1" max="99">
                                    <xsl:if test="type = 'Service'">
                                      <xsl:attribute name="disabled">disabled</xsl:attribute>
                                    </xsl:if>
                                    <xsl:attribute name="onchange">
                                      updateDatabase('<xsl:value-of select="cart_id"/>', this.value);
                                    </xsl:attribute>
                                    <xsl:attribute name="value">
                                      <xsl:value-of select="quantity"/>
                                    </xsl:attribute>
                                  </input>
                        </div>
                        <div class="col-2 primary-color m-auto">
                            <button type="button" class="btn btn-danger">
                                 <xsl:attribute name="onclick" >deleteCart(<xsl:value-of select="cart_id"/>);</xsl:attribute>
                                 Drop
                             </button>
                        </div>

                    </div>
                    
                    <script>
                        var total= 
                    </script>
                    </xsl:for-each>
                    
                </div>
                
                

                <div class="col-12">
                    <div class="row shadow-sm">

                        <form method="post" action="Payment.php">
                        <div class="col-9 text-end primary-color fs-4 m-4">Total Price : RM <xsl:value-of select="$totalPrice"/></div>
                        <div class="col-2 float-end m-4">
                            <input type="Submit" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Check Out"/>
                            <input type="hidden" name="total" id="total" value="{ $totalPrice }" />                                
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        
                
                
                
                
                
<!--                <div style="overflow-x:auto;">
          <table class="table table-bordered" style="">
            <thead>
              <tr>
                <th colspan="7">Product Cart</th>
 
              </tr>
            </thead>
            <tbody style="background-color:white;">
              <xsl:for-each select="products/product">
                <tr style="
  padding: 5px;
  border: 2px #2BDEDE;  
  background-color: white;
border-radius: 25px; ">
                    <td colspan="5" rowspan="5">
                        <img src="./Shared/Image/{productImage}" alt="Product Image" width="200" heigh="200" style="text-align: center;"/>
                    </td>
                    <td></td>
                    <td colspan="5" rowspan="5">
                                <button>
                                 <xsl:attribute name="onclick">deleteCart(<xsl:value-of select="cart_id"/>);</xsl:attribute>
                                 Delete
                             </button>
                    </td>
                </tr>
                    <tr>
                        <td>
                      Product ID:<xsl:value-of select="productID"/>
                  </td>
                    </tr>
                    <tr>
                        <td>Cart ID:<xsl:value-of select="cart_id"/></td>
                    </tr>
                    <tr>
                        <td>Product Name :<xsl:value-of select="name"/></td>

                         
                    </tr>              
                  <tr>
                    <td><input type="number" id="quantity">
                            <xsl:attribute name="value">
                                <xsl:value-of select="quantity"/>
                            </xsl:attribute>
                        </input>
                      
                  </td>        
                </tr>
                    
                        
                        
                 
                                       
                
              </xsl:for-each>
              
              
            </tbody>
          </table>
       </div> 
       <div style="width:100%;align:center;">
           <button style="text-align:center;">
                                 <xsl:attribute name="onclick">PayAll();</xsl:attribute>
                                 Pay All
                             </button> 
           
       </div >    -->
       

            </body>
        </html>
      
</xsl:template>


</xsl:stylesheet>
