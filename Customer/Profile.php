<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Profile</title>
    </head>
    <body>
        <?php
            include '../Shared/PHP/CustomerHeader.php';
        ?>
        
        <?php
            $xslFile = "../Customer/xsl/CustomerProfile.xsl";
            require '../Shared/Database/CustomerDatabase.php';

            if($_SESSION['customerID'] == null){
                header("Location : http://localhost/IP_Assignment/Homepage.php");
            }
            
            $customerID = $_SESSION['customerID'];
            $customerDatabase = new CustomerDatabase();
            $customer = $customerDatabase->getProfile($customerID);

            $xml = new SimpleXMLElement('<Customer/>');

            $profile = $xml->addChild('Customer');

            $profile->addChild('id', $customer->getID());
            $profile->addChild('email', $customer->getEmail());
            $profile->addChild('customerName', $customer->getName());
            $profile->addChild('mobile', $customer->getMobile());
            $profile->addChild('password', $customer->getPassword());

            $xslt = new XSLTProcessor();
            $xsldoc = new DOMDocument();
            $xsldoc->load($xslFile);
            $xslt->importStylesheet($xsldoc);
            $html = $xslt->transformToXML($xml);
        
        
            echo $html;
        ?>
        
        <?php
            include '../Shared/PHP/CustomerFooter.php';
        ?>
    </body>
</html>
