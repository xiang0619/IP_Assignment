<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
        <?php
        include '../Shared/PHP/CustomerHeader.php';
        require '../Shared/Database/CustomerDatabase.php';

        include "PaymentHistoryRetrieve.php";
        $xslFile = "./xsl/PaymentHistory.xsl";

// Apply the XSLT stylesheet to the XML data
        $xslt = new XSLTProcessor();
        $xsldoc = new DOMDocument();
        $xsldoc->load($xslFile);
        $xslt->importStylesheet($xsldoc);
        $html = $xslt->transformToXML($xml);

        if ($_SESSION['customerID'] == null) {
            header("Location : http://localhost/IP_Assignment/Homepage.php");
        }

//        $customerID = $_SESSION['customerID'];
//
//        $customerDatabase = new CustomerDatabase();
//        $customer = $customerDatabase->getProfile($customerID);
//        $encryptionHelper = new EncryptionHelper("Customer");
        ?>

        <div>
            <main class="container-fluid mb-4 mt-4 text-center" style="">
                <h1>Products</h1>
            </main>
            <main class="container-fluid">

                <div class="mb-3">
                    <div style="display: flex; align-items: center;">
                        <p style="display: inline; margin-right: 10px; padding-top:15px;">Filter by Categories:</p>
                        <button class="btn active" style="" onclick="showAll()">All</button>

                    </div>
                    <form id="search-form" method="get" style="display: flex; align-items: center;">
                        <input type="text" id="search-input" class="me-2 form-control" placeholder="Search by name...">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>

                <div id="products-container">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="result" class="table-light"></tbody>
                        </table>
                    </div>
                </div>

                <div id="products-container1">

                    <?php echo $html ?>

                </div>




            </main>   
        </div>

        <?php
        include '../Shared/PHP/CustomerFooter.php';
        ?>
    </body>
</html>
