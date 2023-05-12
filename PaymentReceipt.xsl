<!-- @author: Tham Jun Yuan --> 
<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>PaymentReceipt.xsl</title>
            </head>
            <body>
                <!--                <h1>Payment Receipt</h1>
                <p>
                    <strong>Transaction ID:</strong> 
                    <xsl:value-of select="PaymentReceipt/TransactionID"/>
                </p>
                <p>
                    <strong>Amount:</strong> 
                    <xsl:value-of select="PaymentReceipt/Amount"/>
                </p>
                <p>
                    <strong>Date:</strong> 
                    <xsl:value-of select="PaymentReceipt/Date"/>
                </p>
                <p>
                    <strong>Status:</strong> 
                    <xsl:value-of select="PaymentReceipt/Status"/>
                </p>-->
                <div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Product</th>
                                <th class="hidden-xs">Description</th>
                                <th class="hidden-480">Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <xsl:for-each select="paymentReceipt/payment">
                        <tbody>
                            <tr>
                                <td class="center">1</td>

                                <td>
                                    <xsl:value-of select="transaction_date"/>
                                </td>
                                <td class="hidden-xs">
                                    1 year domain registration
                                </td>
                                <td class="hidden-480"> --- </td>
                                <td>$10</td>
                            </tr>


                            <tr>
                                <td class="center">3</td>
                                <td>Hosting</td>
                                <td class="hidden-xs"> 1 year basic hosting </td>
                                <td class="hidden-480"> 10% </td>
                                <td>$90</td>
                            </tr>

                            <tr>
                                <td class="center">4</td>
                                <td>Design</td>
                                <td class="hidden-xs"> Theme customization </td>
                                <td class="hidden-480"> 50% </td>
                                <td>$250</td>
                            </tr>
                        </tbody>
                        </xsl:for-each>
                    </table>
                </div>

                <div class="hr hr8 hr-double hr-dotted"></div>

                <div class="row">
                    <div class="col-sm-5 pull-right">
                        <h4 class="pull-right">
                            Total amount :
                            <span class="red">$395</span>
                        </h4>
                    </div>

                </div>
               
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
