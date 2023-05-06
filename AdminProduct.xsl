<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : AdminProduct.xsl
    Created on : 5 May 2023, 5:45 pm
    Author     : KahSeng
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
  
      <div style="overflow-x:auto;">
          <table class="table table-bordered" style="border:solid;">
            <thead style="background-color:lightgray;">
              <tr>
                <th></th>
                <th></th>
                <th style="width:100px;">ID</th>
                <th style="width:100px;">Name</th>                
                <th style="width:100px;">Quantity</th>
                <th style="width:100px;">Status</th>
                <th style="width:100px;">Price</th>                               
                <th style="width:100px;">Description</th>
                <th style="width:100px;">Image</th>
                <th>Type ID</th>
                <th>Upload Date</th>              
                <th>Updated ID</th>
                <th>Updated Date</th>
                <th>Created ID</th>
                <th>Created Date</th>  
              </tr>
            </thead>
            <tbody style="background-color:white;">
              <xsl:for-each select="products/product">
                <tr>
                    <td>
                        <button style="background-color:green; border:none; border-radius:4px; padding:10px;">
                            <a>
                                <xsl:attribute name="href">
                                  <xsl:value-of select="concat('AdminProductEditForm.php?id=', product_id)" />
                                </xsl:attribute>
                                <span style="color:white;">Edit</span>
                            </a>                            
                        </button>
                    </td>
                  <td>
                      <button style="background-color:red; border:none; border-radius:4px; padding:10px;">
                            <a>
                                <xsl:attribute name="href">
                                  <xsl:value-of select="concat('AdminProductEditForm.php?id=', product_id)" />
                                </xsl:attribute>
                                <span style="color:white;">Delete</span>
                            </a> 
                        </button>
                  </td>
                  <td><xsl:value-of select="product_id"/></td>
                  <td><xsl:value-of select="product_name"/></td>                  
                  <td><xsl:value-of select="product_quantity"/></td>
                  <td><xsl:value-of select="product_status"/></td>
                  <td><xsl:value-of select="product_price"/></td>                                   
                  <td><xsl:value-of select="product_description"/></td>
                  <td><xsl:value-of select="product_image"/></td>
                  <td><xsl:value-of select="product_type_id"/></td>
                  <td><xsl:value-of select="product_upload_date"/></td>                  
                  <td><xsl:value-of select="product_updated_id"/></td>
                  <td><xsl:value-of select="product_updated_date"/></td>
                  <td><xsl:value-of select="product_create_id"/></td>
                  <td><xsl:value-of select="product_created_date"/></td>   
                </tr>
              </xsl:for-each>
            </tbody>
          </table>
       </div>      
 
</xsl:template>


</xsl:stylesheet>
