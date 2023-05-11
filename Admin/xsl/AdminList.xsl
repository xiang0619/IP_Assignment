<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    
    <xsl:template match="/">
        <html>
            <head>
                <title>AdminList.xsl</title>
            </head>
            <body>
                <div class="table-responsive mt-4 ms-4 me-4">
                    <table class="table table-hover">
                      <thead class="table-dark">
                        <tr>
                            <th></th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                        </tr>
                      </thead>
                      <tbody class="table-light">
                        <xsl:for-each select="Staffs/staff">
                          <tr>
                            <td style="width:180px;">
                                <button class="btn btn-success me-2">
                                    <a href="{concat('AdminEditStatus.php?id=', id)}" class="text-white">Edit Status</a>
                                </button>
                            </td>
                            <td><a href="AdminDetails.php?id={id}" class="text-dark"><xsl:value-of select="email"/></a></td>
                            <td><xsl:value-of select="name"/></td>
                            <td><xsl:value-of select="position"/></td>
                            <td><xsl:value-of select="mobile"/></td>
                            <td><xsl:value-of select="status"/></td>
                          </tr>
                        </xsl:for-each>
                      </tbody>
                    </table>
                  </div>
                
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
