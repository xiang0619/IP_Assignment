<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <!--
       Author     : Chin Kah Seng
    -->
    <xsl:template match="/">
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2.10.3/dist/bundle.min.js"></script>
        <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Payment ID</th>
                        <th>Total Payment</th>
                        <th>Payment Method</th>                      
                    </tr>
                </thead>
                <tbody class="table-light">
                    <xsl:for-each select="orders/order">
                        <tr>                           
                            <td>
                                <a href="AdminOrderDetails.php?oid={orderID}" class="text-dark">
                                    <xsl:value-of select="orderID"/>
                                </a>
                            </td>
                            <td>
                                <xsl:value-of select="customerID"/>
                            </td>
                            <td>
                                <xsl:value-of select="customerName"/>
                            </td>
                            <td>
                                <xsl:value-of select="paymentID"/>
                            </td>
                            <td>
                                <xsl:value-of select="totalPayment"/>
                            </td>
                            <td>
                                <xsl:value-of select="paymentMethod"/>
                            </td>                           
                        </tr>
                    </xsl:for-each>
                </tbody>
            </table>
        </div>
 
    </xsl:template>


</xsl:stylesheet>
