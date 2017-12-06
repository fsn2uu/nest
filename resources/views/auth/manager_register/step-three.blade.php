@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="content">



            <h1>Wrapping up</h1>
            <p>That's it!  Just enter your payment information below and we'll get you started.</p>

            <?php
            switch (\Request::get('plan_id')) {
                case 'nest-1':
                $plan = 'Casual Plan';
                $total = '274.99';
                $cost = '24.99';
                break;
                case 'nest-2':
                $plan = 'Intermediate Plan';
                $total = '599.99';
                $cost = '99.99';
                break;
                case 'nest-3':
                $plan = 'Professional Plan';
                $total = '1659.99';
                $cost = '159.99';
                break;
            }
            ?>

            <p>You selected the <strong>{{ $plan }}</strong>, which brings today's total to <strong>${{ $total }}</strong>.</p>

            <p>Remember, you'll automatically be billed <strong>${{ $cost }}</strong> every month.</p>



            <div class="columns">
                <div class="column is-one-third"></div>
                <div class="column is-one-third">
                    <div class="card">
                        <div class="card-content">
                            <form action="{{ route('list.step.four') }}" method="post" id="payment-form">
                                {{ csrf_field() }}

                                <input type="hidden" name="user_name" value="{{ \Request::get('user_name') }}">
                                <input type="hidden" name="user_email" value="{{ \Request::get('user_email') }}">
                                <input type="hidden" name="user_password" value="{{ \Request::get('user_password') }}">
                                <input type="hidden" name="company_name" value="{{ \Request::get('name') }}">
                                <input type="hidden" name="company_phone" value="{{ \Request::get('phone') }}">
                                <input type="hidden" name="company_email" value="{{ \Request::get('email') }}">
                                <input type="hidden" name="company_address" value="{{ \Request::get('address') }}">
                                <input type="hidden" name="company_address2" value="{{ \Request::get('address2') }}">
                                <input type="hidden" name="company_city" value="{{ \Request::get('city') }}">
                                <input type="hidden" name="company_state" value="{{ \Request::get('state') }}">
                                <input type="hidden" name="company_zip" value="{{ \Request::get('zip') }}">
                                <input type="hidden" name="company_url" value="{{ \Request::get('url') }}">
                                <input type="hidden" name="company_logo" value="{{ \Request::get('logo') }}">
                                <input type="hidden" name="plan_id" value="{{ \Request::get('plan_id') }}">

                                <p class="help is-danger" id="card-errors"></p>
                                <div class="field">
                                    <label for="" class="label">Card Number</label>
                                    <p class="control" id="card-number">
                                    </p>
                                </div>

                                <div class="field">
                                    <label for="" class="label">Expiration Date</label>
                                    <p class="control" id="card-exp">
                                    </p>
                                </div>

                                <div class="field">
                                    <label for="" class="label">CVC Number</label>
                                    <p class="control" id="card-cvc">
                                    </p>
                                </div>

                                <button class="button is-success is-outlined is-fullwidth">Sign Me Up!</button>
                            </form>
                        </div>
                    </div> {{--  /.card --}}
                    <small>By signing up for this service, you agree to our <a href="{{ route('terms') }}" target="_blank">terms of service</a>.</small>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')


    <script>
    $(function(){
        // Create a Stripe client
        var stripe = Stripe('pk_test_KAnlXuJl0WGX0duNtIC8hla8');

        // Create an instance of Elements
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                display: 'block',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element
        var card = elements.create('cardNumber', {style: style});

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-number');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // CVC
        var cvc = elements.create('cardCvc', {
            'placeholder': 'CVC #',
            'style': style
        });
        cvc.mount('#card-cvc');

        cvc.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Card expiry
        var exp = elements.create('cardExpiry', {
            'placeholder': 'MM/YY',
            'style': style
        });
        exp.mount('#card-exp');

        exp.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.token);
                }
            });
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
    </script>

@endsection
