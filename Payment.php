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
        
        
        <title>Payment</title>
    <body>
    </head>


    <div class="card mt-50 mb-50">
        <div class="card-title mx-auto">
            Settings
        </div>
        <div class="nav">
            <ul class="mx-auto">
                <li><a href="#">Account</a></li>
                <li class="active"><a href="#">Payment</a></li>
            </ul>
        </div>
        <form action="" method="post" name="cardpayment" id="payment-form">
            <span id="card-header">Saved cards:</span>
            <div class="row row-1">
                <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/></div>
                <div class="col-7">
                    <input type="text" placeholder="**** **** **** 3193">
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <a href="#">Remove card</a>
                </div>
            </div>
            <div class="row row-1">
                <div class="col-2"><img  class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png"/></div>
                <div class="col-7">
                    <input type="text" placeholder="**** **** **** 4296">
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <a href="#">Remove card</a>
                </div>
            </div>
            <span id="card-header">Add new card:</span>
            <div class="row-1">
                <div class="row row-2">
                    <span id="card-inner">Card holder name</span>
                </div>
                <div class="row row-2">
                    <input type="text" placeholder="Bojan Viner">
                </div>
            </div>
            <div class="row three">
                <div class="col-7">
                    <div class="row-1">
                        <div class="row row-2">
                            <span id="card-inner">Card number</span>
                        </div>
                        <div class="row row-2">
                            <input type="text" placeholder="5134-5264-4">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <input type="text" placeholder="Exp. date">
                </div>
                <div class="col-2">
                    <input type="text" placeholder="CVV">
                </div>
            </div>
            <button class="btn d-flex mx-auto"><b>Add card</b></button>
        </form>
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
