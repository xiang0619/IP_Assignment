<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JE Admin</title>
	
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2.10.3/dist/bundle.min.js"></script>
        <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <style>
            .dropdown:hover .dropdown-menu {
              display: block;
              position: absolute;
              left: 50%;
              transform: translateX(-50%);
              top: 100%;
            }      
            #adminService1, #adminReport1, #adminProduct1{
                color:white;
            }
        </style>
    </head>
    <body>
        <?php
            include '../Shared/PHP/AdminHeader.php';
        ?>
        <main class="container-fluid mb-4 mt-4 text-center" style="">
            <h1>Staff List</h1>
	</main>
        <?php
            include '../Shared/Database/StaffDatabase.php';

            $staffDatabase = new StaffDatabase();
            $staffList = $staffDatabase->getStaffList();

            $xmlDoc = new DOMDocument();
            $xmlDoc->formatOutput = true;

            // Create the root element
            $root = $xmlDoc->createElement("Staffs");
            $xmlDoc->appendChild($root);

            foreach ($staffList as $staff) {
                $staffElem = $xmlDoc->createElement("staff");

                $idElem = $xmlDoc->createElement("id", $staff->getId());
                $staffElem->appendChild($idElem);

                $emailElem = $xmlDoc->createElement("email", $staff->getEmail());
                $staffElem->appendChild($emailElem);

                $nameElem = $xmlDoc->createElement("name", $staff->getName());
                $staffElem->appendChild($nameElem);

                $positionElem = $xmlDoc->createElement("position", $staff->getPosition());
                $staffElem->appendChild($positionElem);
                
                $mobileElem = $xmlDoc->createElement("mobile", $staff->getMobile());
                $staffElem->appendChild($mobileElem);

                $statusElem = $xmlDoc->createElement("status", $staff->getStatus());
                $staffElem->appendChild($statusElem);

                // Append staffElem to the root element
                $root->appendChild($staffElem);
            }

            // Save the XML document to a file
            $xmlDoc->save("../Admin/xml/AdminList.xml");

            // Perform XSL transformation
            $xslDoc = new DOMDocument();
            $xslDoc->load("../Admin/xsl/AdminList.xsl");

            $proc = new XSLTProcessor();
            $proc->importStylesheet($xslDoc);

            // Output the transformed result
            $result = $proc->transformToXml($xmlDoc);
            if ($result !== false) {
                echo $result;
            } else {
                echo "Error occurred during XSL transformation.";
            }
            ?>


    </body>
</html>
