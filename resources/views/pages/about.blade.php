@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{--<div class="jumbotron">--}}
                    {{--<h1 class="display-3">Welcome to my about page </h1>--}}
                    {{--<p class="lead">Thank you for visiting the website</p>--}}
                    {{--<p class="lead">--}}
                        {{--<a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>--}}
                    {{--</p>--}}
                {{--</div>--}}
                <code>
                    <p><b>Payment Information:</b></p>
                    <fieldset>
                        <input type="radio" name="payment" value="Visa" id="visa" />Visa &nbsp;
                        <input type="radio" name="payment" value="Master Card" />Master Card &nbsp;
                        <input type="radio" name="payment" value="American Express" />American Express &nbsp;
                        <input type="radio" name="payment" value="Discover" />Discover <br /><br />
                        <label>Card Number:</label>
                        <input type="text" name="cardNumber" id="cardNum" size="30" value="" />
                        <input type="submit" onblur="ValidateCreditCardNumber()">
                    </fieldset>
                </code>




            </div>
        </div>
    </div> <!-- end container-->
@endsection
<script>
    function ValidateCreditCardNumber() {

        // Store the regexes as globals so they're cached and not re-parsed on every call:
        var visaPattern = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
        var mastPattern = /^(?:5[1-5][0-9]{14})$/;
        var amexPattern = /^(?:3[47][0-9]{13})$/;
        var discPattern = /^(?:6(?:011|5[0-9][0-9])[0-9]{12})$/;

        function validateCreditCardNumber() {

            var ccNum = document.getElementById("cardNum").value;

            var isVisa = visaPattern.test(ccNum) === true;
            var isMast = mastPattern.test(ccNum) === true;
            var isAmex = amexPattern.test(ccNum) === true;
            var isDisc = discPattern.test(ccNum) === true;

            if (isVisa || isMast || isAmex || isDisc) {
                // at least one regex matches, so the card number is valid.

                if (isVisa) {
                    // Visa-specific logic goes here
                }
                else if (isMast) {
                    // Mastercard-specific logic goes here
                }
                else if (isAmex) {
                    // AMEX-specific logic goes here
                }
                else if (isDisc) {
                    // Discover-specific logic goes here
                }
            }
            else {
                alert("Please enter a valid card number.");
            }
        }
    }

</script>




