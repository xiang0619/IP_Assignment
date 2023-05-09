<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>CustomerProfile.xsl</title>
            </head>
            <body>
                <div class="row">
            
            <!-- Make div center -->
            <div class="col-3"></div>
            
            <div class="col-6 shadow-lg text-center m-5">
                <div class="row">
                    <!-- Icon position -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people-fill primary-color col-12 m-0" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>

                    <div class="col-12 primary-color fs-3">Profile</div>
                    
                    <div class="col-4 fs-5 primary-color mt-2 mb-2">Email : </div>
                    <div class="col-8 fs-5 primary-color mt-2 mb-2"><xsl:value-of select="Customer/Customer/email"/></div>
                    
                    <div class="col-4 fs-5 primary-color mt-2 mb-2">Name : </div>
                    <div class="col-8 fs-5 primary-color mt-2 mb-2"><xsl:value-of select="Customer/Customer/customerName"/></div>
                    
                    <div class="col-4 fs-5 primary-color mt-2 mb-2">Mobile Number : </div>
                    <div class="col-8 fs-5 primary-color mt-2 mb-2"><xsl:value-of select="Customer/Customer/mobile"/></div>
                    
                    <div class="col-4 mt-2 mb-2"><a href="ChangePassword.php" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;">Change Password</a></div>
                    <div class="col-4 mt-2 mb-2"></div>
                    <div class="col-4 mt-2 mb-2 "><a href="EditProfile.php" class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;">Edit Profile</a></div>
                </div>
            </div>
            
            <!-- Make div center -->
            <div class="col-3"></div>
            
        </div>
        
                
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
