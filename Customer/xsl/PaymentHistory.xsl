<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : PaymentHistory.xsl
    Created on : May 15, 2023, 10:51 PM
    Author     : User
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>PaymentHistory.xsl</title>
            </head>
            <body>
                <xsl:for-each select="payments/payment">
                        
                            <tr>
                                <td>
                                    <xsl:value-of select="position()"/>
                                </td>

                                <td>
                                    <xsl:value-of select="customer/customer_name"/>
                                </td>
                                <td>
                                    <xsl:value-of select="name"/>
                                </td>
                                <td>
                                    <xsl:value-of select="total_payment"/>
                                </td>
                                <td>
                                    <xsl:value-of select="payment_date"/>
                                </td>
                                <td>
                                    <xsl:value-of select="payment_status"/>
                                </td>
                            </tr>
                    
                    
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
