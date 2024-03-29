<!-- @author: Tham Jun Yuan --> 
<?php
    include 'config.php';
    include './Shared/Helper/EncryptionHelper.php';

    session_start();
    $z = new EncryptionHelper("Customer");

    // Decrypt customer ID
    $customerID = $z->decrypt($_SESSION['customerID']);

    // Redirect to customer login page if customer is not logged in
    if ($customerID == null) {
        echo '<script>';
        echo "alert('Please log in first.');";
        echo '</script>';
        header("Location: ./CustomerLogin.php");
    }

    // Retrieve payment details from database
    $stmt = $dbc->prepare("SELECT * FROM payment WHERE customerID = ?");
    $stmt->bind_param('i', $customerID);
    $stmt->execute();
    $result = $stmt->get_result();
    $payment = $result->fetch_assoc();
    $stmt->close();

    // Create the root element
    $xml = new SimpleXMLElement('<paymentReceipt/>');

    // Add child elements to the root element using the $payment variable
    $paymentNode = $xml->addChild('payment');
    $paymentNode->addChild('paymentID', $payment['paymentID']);
    $paymentNode->addChild('customerID', $payment['customerID']);
    $paymentNode->addChild('paymentMethod', $payment['paymentMethod']);
    $paymentNode->addChild('paymentDate', $payment['paymentDate']);
    $paymentNode->addChild('productID', $payment['productID']);
    $paymentNode->addChild('totalPayment', $payment['totalPayment']);
    $paymentNode->addChild('payment_status', $payment['payment_status']);

    // Save XML to a file
    $xml->asXML('PaymentReceipt.xml');

    // Load the XML file and XSL stylesheet
    $xmlDoc = new DOMDocument();
    $xmlDoc->load('PaymentReceipt.xml');

    $xslDoc = new DOMDocument();
    $xslDoc->load('PaymentReceipt.xsl');

    // Create an XSLT processor and import the XSL stylesheet
    $proc = new XSLTProcessor();
    $proc->importStylesheet($xslDoc);

    // Transform the XML file using the XSL stylesheet and output the result
    echo $proc->transformToXML($xmlDoc);
?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="Shared/CSS/PaymentReceipt.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>


        <title></title>
    </head>
    <body>
        <div class="container bootdey">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="widget-box">
                        <div class="widget-header widget-header-large">
                            <h3 class="widget-title grey lighter">
                                <i class="ace-icon fa fa-leaf green"></i>
                                JE receipt
                            </h3>

                            <div class="widget-toolbar no-border invoice-info">
                                <span class="invoice-info-label">Invoice:</span>
                                <span class="red">#121212</span>

                                <br>
                                <span class="invoice-info-label">Date:</span>
                                <span class="blue"><?php date_default_timezone_set("Asia/Kuala_Lumpur");
echo date("d-m-Y") ?></span>
                            </div>

                            <div class="widget-toolbar hidden-480">
                                <a href="#">
                                    <i class="ace-icon fa fa-print"></i>
                                </a>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main padding-24">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
                                                <b>Company Info</b>
                                            </div>
                                        </div>

                                        <div>
                                            <ul class="list-unstyled spaced">
                                                <li>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>Street, City
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>Zip Code
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>State, Country
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>
                                                    Phone:
                                                    <b class="red">111-111-111</b>
                                                </li>

                                                <li class="divider"></li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>
                                                    Payment Info
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- /.col -->

                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                                <b>Customer Info</b>
                                            </div>
                                        </div>

                                        <div>
                                            <ul class="list-unstyled  spaced">
                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i>Street, City
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i>Zip Code
                                                </li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i>State, Country
                                                </li>

                                                <li class="divider"></li>

                                                <li>
                                                    <i class="ace-icon fa fa-caret-right green"></i>
                                                    Contact Info
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->

                                <div class="space"></div>

                                <!------ !!!!!!!!!!!!!!!!!!! -------------> 
                                <?php echo $html; ?>

                                <div class="space-6"></div>

                                <div class="col-sm-7 pull-left"> Extra Information : </div>
                                <div class="well">
                                    Thank you for choosing JE Services.
                                    We believe you will be satisfied by our services.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
