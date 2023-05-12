<?php //
//require_once('Shared/Stripe/init.php'); // Include Stripe PHP library
//
//\Stripe\Stripe::setApiKey('sk_test_51N4IUNEd7cmSO65bnsVFQ59rs2hxKJvANEV2ZPsrcuw2Lvl3MNkr8dJhbadm5Yowv2cxrcc52xAMvr0lUBX9IiSW00y2ZokQ5z');
//
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    $cardNumber = $_POST['cardNumber'];
//    $card = [
//        'number' => $cardNumber,
//        'exp_month' => $_POST['expMonth'],
//        'exp_year' => $_POST['expYear'],
//        'cvc' => $_POST['cvc']
//    ];
//
//    try {
//        // Use the Stripe PHP library to validate the card number
//        $cardToken = \Stripe\Token::create(['card' => $card]);
//    } catch (\Stripe\Exception\CardException $e) {
//        // Card is invalid
//        $error = $e->getError();
//        $message = $error['message'];
//        // Display an error message to the user
//    } catch (\Stripe\Exception\InvalidRequestException $e) {
//        // Invalid parameters were supplied to Stripe's API
//        $error = $e->getError();
//        $message = $error['message'];
//        // Display an error message to the user
//    }
//
//    // If there were no exceptions, the card is valid
//    // You can now use the $cardToken variable to create a charge or save the card for later use
//}
$totalPay = $_POST['total'];

include "CartRetrieve.php";
$xslFile = "Payment.xsl";

$_SESSION['customerID'];


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
        <!-- Stripe JS Link -->
        <script src="https://js.stripe.com/v3/"></script>
        <meta charset="UTF-8">
        <link href="Shared/CSS/PaymentCSS.css" rel="stylesheet" type="text/css"/>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous"></script>
        <title>Payment</title>

    </head>
    <body>

        <div class="card">
            <div class="card-top border-bottom text-center">
                <a href = "javascript:history.back()"> Back to cart</a>
                <span id="logo"><img src="<?php
                    $thisPath = dirname($_SERVER['PHP_SELF']);
                    if ($thisPath != "/IP_Assignment") {
                        echo "../";
                    }
                    ?>Shared/Image/b0b8203f-68d2-47f6-a397-269a9aa1f618.png" width="110px" height="110px" alt="Logo"/></span>
            </div>
            <div class="card-body">
                <!--                <div class="row upper">
                                    <span><i class="fa fa-check-circle-o"></i> Shopping bag</span>
                                    <span><i class="fa fa-check-circle-o"></i> Order details</span>
                                    <span id="payment"><span id="three">3</span>Payment</span>
                                </div>-->
                <div class="row">
                <div class="col-md-7">
                        <div class="left border">
                            <div class="row">
                                <span class="header">Payment</span>
                                <div class="icons">
                                    <img src="https://img.icons8.com/color/48/000000/visa.png"/>
                                    <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/>
                                    <img src="https://img.icons8.com/color/48/000000/maestro.png"/>
                                </div>
                            </div>
                            <form action="PaymentProcess.php" method="post" name="cardpayment" id="payment-form">
                                <span>Cardholder's name:</span>
                                <input type="text" onkeydown="return /[a-z ]/i.test(event.key)" required>
                                <span>Card Number:</span>
                                <input type="text" name="cardNumber" pattern="/^-?\ d*[.]?\ d*$/" maxlength="19" id="cardNumber" placeholder="0125 6780 4567 9909" required oninput="formatCardNumber(this)">
                                <div class="row">
                                    <div class="col-4"><span>Expiry date:</span>
                                        <input type="text" name="expDate" maxlength="5" placeholder="YY/MM" id="expDate"   required>
                                    </div>
                                    <div class="col-4"><span>CVV:</span>
                                        <input id="cvv" type="text" maxlength="3" name="cvv" onkeypress="return /[0-9]/i.test(event.key)" required>
                                    </div>
                                </div>
<!--                                <label for="save_card">Save card details to wallet</label>  -->
                                <button type="submit" name="payBtn" class="btn" style="border: 1px;" >Pay Now</button>
                                <input type="hidden" value="<?php echo $totalPay; ?>" id="price" name="price" /> 
                            </form>
                        </div>                        
                    </div>
                    <div class="col-md-5">
                        <div class="right border">
                            <div class="header">Order Summary</div>
                            <p>Items</p>
                            <?php echo $html; ?>
                            
<!--                            <div class="row item">
                                <div class="col-4 align-self-center"><img class="img-fluid" src="https://i.imgur.com/79M6pU0.png"></div>
                                <div class="col-8">
                                    <div class="row"><b>$ 26.99</b></div>
                                    <div class="row text-muted">Be Legandary Lipstick-Nude rose</div>
                                    <div class="row">Qty:1</div>
                                </div>
                            </div>
                            <div class="row item">
                                <div class="col-4 align-self-center"><img class="img-fluid" src="https://i.imgur.com/Ew8NzKr.jpg"></div>
                                <div class="col-8">
                                    <div class="row"><b>$ 19.99</b></div>
                                    <div class="row text-muted">Be Legandary Lipstick-Sheer Navy Cream</div>
                                    <div class="row">Qty:1</div>
                                </div>
                            </div>-->
                            <hr>
<!--                            <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right">RM </div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Delivery</div>
                                <div class="col text-right">Free</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right"><b>RM </b></div>
                            </div>-->
                           
                            <div class="form-group">
                                <div class="payment-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
            </div>
        </div>



    </body>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_51N4IUNEd7cmSO65bAEw99nd491msbDeRat7hyJma1gaqawVW1LFZ195NJ2yewOSO2vqKagl8VkJCVDuskAy4hqd500LOTNbp8k');
        

        //Auto space after every 4 digits
        function formatCardNumber(input) {
            // Remove all non-digits from the input string
            var inputNumber = input.value.replace(/\D/g, '');

            // Insert a space after every 4 digits
            var formattedNumber = inputNumber.replace(/(\d{4})(?=\d)/g, '$1 ');

            // Update the input field with the formatted number
            input.value = formattedNumber;
        }


        $(function () {
            var $form = $('#payment-form');
            $form.submit(function (event) {
                // Disable the submit button to prevent repeated clicks:
                $form.find('.submit').prop('disabled', true);

                // Request a token from Stripe:
                Stripe.card.createToken($form, stripeResponseHandler);

                // Prevent the form from being submitted:
                return false;
            });
        });
        function stripeResponseHandler(status, response) {
            // Grab the form:
            var $form = $('#payment-form');

            if (response.error) { // Problem!
                // Show the errors on the form:
                $form.find('.payment-errors').text(response.error.message);
                $form.find('.submit').prop('disabled', false); // Re-enable submission
            } else { // Token was created!
                // Get the token ID:
                var token = response.id;
                // Insert the token ID into the form so it gets submitted to the server:
                $form.append($('<input type="hidden" name="stripeToken">').val(token));
                // Submit the form:
                $form.get(0).submit();
            }
        }
        ;
    </script>
</html>
