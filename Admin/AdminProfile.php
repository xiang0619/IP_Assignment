<!DOCTYPE html>
<!--Author: NG WEN XIANG-->
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

            #adminProfile {
                color:white;
            }

            #adminProduct1, #adminService1, #adminReport1,#adminStaff{
                color:white;
            }
        </style>
    </head>
    <body>
        <?php
        include '../Shared/PHP/AdminHeader.php';
        ?>
        <!-- Main Content Area -->

        <main class="container-fluid mb-4 mt-4 text-center" style="">
            <h1>Profile</h1>
        </main>

        <?php
        $xslFile = "../Admin/xsl/AdminProfile.xsl";

        require '../Shared/Database/StaffDatabase.php';

        $staffDatabase = new StaffDatabase();

        $staffID = $_SESSION['staffID'];

        $staff = $staffDatabase->getProfile($staffID);

        $xml = new SimpleXMLElement('<Staff/>');

        $profile = $xml->addChild('Staff');

        $profile->addChild('id', $staff->getID());
        $profile->addChild('email', $staff->getEmail());
        $profile->addChild('name', $staff->getName());
        $profile->addChild('mobile', $staff->getMobile());
        $profile->addChild('password', $staff->getPassword());
        $profile->addChild('status', $staff->getStatus());
        $profile->addChild('position', $staff->getPosition());
        $profile->addChild('updatedID', $staff->getUpdatedID());
        $profile->addChild('updatedDate', $staff->getUpdatedDate());
        $profile->addChild('createdID', $staff->getCreatedID());
        $profile->addChild('createdDate', $staff->getCreatedDate());

        // Apply the XSLT stylesheet to the XML data
        $xslt = new XSLTProcessor();
        $xsldoc = new DOMDocument();
        $xsldoc->load($xslFile);
        $xslt->importStylesheet($xsldoc);
        $html = $xslt->transformToXML($xml);

        echo $html;
        ?>

    </body>
</html>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>


