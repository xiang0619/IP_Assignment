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
  
    
        <html>
            <head>
                <script>
                function deleteCart(id) {
                   
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
            </script>
            </head>
            <body >
                <div style="overflow-x:auto;">
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
              
              <button>
                                 <xsl:attribute name="onclick">PayAll();</xsl:attribute>
                                 Pay All
                             </button>
            </tbody>
          </table>
       </div>      

            </body>
        </html>
      
</xsl:template>


</xsl:stylesheet>
