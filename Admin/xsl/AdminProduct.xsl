<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : AdminProduct.xsl
    Created on : 5 May 2023, 5:45 pm
    Author     : Chin Kah Seng
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <colgroup>
                    <col style="width:300px" />
                    <col style="width:100px" />
                    <col style="width:400px" />
                    <col style="width:200px" />
                    <col style="width:100px" />
                    <col style="width:200px" />
                    <col style="width:100px" />
                    <col style="width:500px" />
                    <col style="width:300px" />
                </colgroup>
                <tbody class="table-light">
                    <xsl:for-each select="products/product">
                        <tr>
                            <td>
                                <button class="btn btn-success me-2">
                                    <a href="AdminProductEditForm.php?id={product_id}" class="text-white">Edit</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a href="AdminProductDeleteForm.php?id={product_id}" class="text-white">Delete</a>
                                </button>
                            </td>
                            <td>
                                <xsl:value-of select="product_id"/>
                            </td>
                            <td>
                                <a href="AdminProductDetails.php?id={product_id}" class="text-dark">
                                    <xsl:value-of select="product_name"/>
                                </a>
                            </td>
                            <td>
                                <xsl:value-of select="product_type_id"/>
                            </td>
                            <td>
                                <xsl:value-of select="product_quantity"/>
                            </td>
                            <td>
                                <xsl:value-of select="product_status"/>
                            </td>
                            <td>
                                <xsl:value-of select="product_price"/>
                            </td>
                            <td>
                                <xsl:value-of select="product_description"/>
                            </td>
                            <td>
                                <img src="../Shared/Image/{product_image}" alt="No Img" width="50" height="50"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </tbody>
            </table>
        </div>
    </xsl:template>
</xsl:stylesheet>

