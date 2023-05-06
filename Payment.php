<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
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
                <a href="#"> Back to shop</a>
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
                            <form action="" method="post" name="cardpayment" id="payment-form">
                                <span>Cardholder's name:</span>
                                <input placeholder="Linda Williams">
                                <span>Card Number:</span>
                                <input placeholder="0125 6780 4567 9909">
                                <div class="row">
                                    <div class="col-4"><span>Expiry date:</span>
                                        <input placeholder="YY/MM">
                                    </div>
                                    <div class="col-4"><span>CVV:</span>
                                        <input id="cvv">
                                    </div>
                                </div>
                                <input type="checkbox" id="save_card" class="align-left">
                                <label for="save_card">Save card details to wallet</label>  
                            </form>
                        </div>                        
                    </div>
                    <div class="col-md-5">
                        <div class="right border">
                            <div class="header">Order Summary</div>
                            <p>2 items</p>
                            <div class="row item">
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
                            </div>
                            <hr>
                            <div class="row lower">
                                <div class="col text-left">Subtotal</div>
                                <div class="col text-right">$ 46.98</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left">Delivery</div>
                                <div class="col text-right">Free</div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left"><b>Total to pay</b></div>
                                <div class="col text-right"><b>$ 46.98</b></div>
                            </div>
                            <div class="row lower">
                                <div class="col text-left"><a href="#"><u>Add promo code</u></a></div>
                            </div>
                            <button class="btn">Place order</button>
                            <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
            </div>
        </div>



    </body>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_51N4IUNEd7cmSO65bAEw99nd491msbDeRat7hyJma1gaqawVW1LFZ195NJ2yewOSO2vqKagl8VkJCVDuskAy4hqd500LOTNbp8k');
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
