<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : Payment.xsl
    Created on : May 12, 2023, 4:31 PM
    Author     : Tham Jun Yuan
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <xsl:variable name="totalPrice" select="sum(products/product/total)" />
        <html>
            <head>
                <title>Payment.xsl</title>
            </head>
            <body>
                <xsl:for-each select="products/product">
                    <div class="row item">
                                <div class="col-4 align-self-center"><img class="img-fluid" src="./Shared/Image/{productImage}" /></div>
                                <div class="col-8">
                                    <div class="row"><b>RM <xsl:value-of select="productPrice"/></b></div>
                                    <div class="row text-muted"><xsl:value-of select="name"/></div>
                                    <div class="row">Quantity : <xsl:value-of select="quantity"/></div>
                                </div>
                    </div>
                     
                </xsl:for-each>
                
                <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right">
                                    <b>RM <xsl:value-of select="$totalPrice"/></b>
                                </div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Delivery</div>
                                <div class="col text-right">Free</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right">
                                    <b>RM <xsl:value-of select="$totalPrice"/></b>
                                </div>
                    </div>
                    
           
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
