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
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://unpkg.com/@popperjs/core@2.10.3/dist/bundle.min.js"></script>
                <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
      <div class="table-responsive">
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th></th>
          <th>ID</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Status</th>
          <th>Price</th>
          <th>Description</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody class="table-light">
        <xsl:for-each select="products/product">
          <tr>
            <td style="width:180px;">
              <button class="btn btn-success me-2">
                <a href="AdminProductEditForm.php?id={product_id}" class="text-white">Edit</a>
              </button>
            
              <button class="btn btn-danger">
                <a href="AdminProductDeleteForm.php?id={product_id}" class="text-white">Delete</a>
              </button>
            </td>
            <td><xsl:value-of select="product_id"/></td>
            <td><a href="AdminProductDetails.php?id={product_id}" class="text-dark"><xsl:value-of select="product_name"/></a></td>
            <td><xsl:value-of select="product_quantity"/></td>
            <td><xsl:value-of select="product_status"/></td>
            <td><xsl:value-of select="product_price"/></td>
            <td><xsl:value-of select="product_description"/></td>
            <td><img src="../Shared/Image/{product_image}" alt="{product_name}" width="50" height="50"/></td>
          </tr>
        </xsl:for-each>
      </tbody>
    </table>
  </div>
 
</xsl:template>


</xsl:stylesheet>
