<?xml version="1.0" encoding="UTF-8"?>
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
                        <th>Email</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Mobile</th>
                        <th>Updated ID</th>
                        <th>Updated Date</th>
                        <th>Created ID</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <xsl:for-each select="staffs/staff">
                        <tr>
                            <td style="width:180px;">
                                <button class="btn btn-success me-2">
                                    <a href="AdminStaffEdit.php?id={staff_id}" class="text-white">Edit</a>
                                </button>
            
                                <button class="btn btn-danger">
                                    <a href="AdminStaffDelete.php?id={staff_id}" class="text-white">Delete</a>
                                </button>
                            </td>
                            <td>
                                <xsl:value-of select="staff_id"/>
                            </td>
                            <td>
                                <a href="AdminStaffDetail.php?id={staff_id}" class="text-dark">
                                    <xsl:value-of select="staff_name"/>
                                </a>
                            </td>
                            <td>
                                <xsl:value-of select="staff_email"/>
                            </td>
                            <td>
                                <xsl:value-of select="staff_status"/>
                            </td>
                            <td>
                                <xsl:value-of select="staff_position"/>
                            </td>
                            <td>
                                <xsl:value-of select="staff_mobile"/>
                            </td>
                            <td>
                                <xsl:value-of select="staff_updateID"/>
                            </td>
                            <td>
                                <xsl:value-of select="staff_updateDate"/>
                            </td>
                            <td>
                                <xsl:value-of select="staff_createID"/>
                            </td>
                            <td>
                                <xsl:value-of select="staff_createDate"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </tbody>
            </table>
        </div>
 
    </xsl:template>


</xsl:stylesheet>
