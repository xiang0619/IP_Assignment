<?php
include "CartRetrieve.php";
$xslFile = "CartView.xsl";

// Apply the XSLT stylesheet to the XML data
$xslt = new XSLTProcessor();
$xsldoc = new DOMDocument();
$xsldoc->load($xslFile);
$xslt->importStylesheet($xsldoc);
$html = $xslt->transformToXML($xml);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>My Cart</title>
       
    
</head>
<body>
            <?php
        
            include './Shared/PHP/Header.php';
            echo $html; 
            include './Shared/PHP/Footer.php';?>
            
</body>
</html>

