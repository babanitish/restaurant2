@extends('client_layout.head_foot')


@section('content')
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }



        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .contain {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #04AA6D;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
    <section class="food_section layout_padding-bottom">

        <div class="container">
            @if (Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
            @endif
            <div class="row">

                <div class="col-75">
                    <div class="container contain mt-3">
                        <form action="{{ route('place-order') }}" method="post" class="needs-validation" id="payment-form"
                            id="payment-form">
                            @csrf
                            <div class="row">
                                <div class="col-50">
                                    <h3>Adresse de facturation</h3>
                                    <label for="fname"><i class="fa fa-user"></i> Nom</label>
                                    <input type="text" class="form-control" id="firstName" name="name" placeholder=""
                                        value="{{ Auth::user()->name }}" required>
                                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ Auth::user()->email }}" placeholder="you@example.com">
                                    <label for="adr"><i class="fa fa-address-card-o"></i> Adresse</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ Auth::user()->address }}" placeholder="1234 Main St" required>
                                    <label for="phone"><i class="fa fa-institution"></i> numéro</label>
                                    <input type="number" class="form-control" id="number" name="number"
                                        value="{{ Auth::user()->phone }}" placeholder="04-55-66-77-88" required>

                                    <div class="row">
                                        {{-- <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                </div> --}}
                                    </div>

                                </div>

                                <div class="col-50">
                                    <div class="container contain mt-3">

                                        <table class="table table-dark">
                                            <thead>
                                                <tr>
                                                    <th>nom</th>
                                                    <th>quantité</th>
                                                    <th>prix</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach (Cart::content() as $product)
                                                    <tr>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->qty }}</td>
                                                        <td>{{ $product->price }}</td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        @if (session::has('coupon'))
                                            <p> coupon<span class="price"
                                                    style="color:black"><b>{{ session()->get('coupon')['discount'] }}%</b></span>
                                            </p>
                                            <p>Total <span class="price" style="color:black"><b>€
                                                        {{ Cart::total() - (Cart::total() * session()->get('coupon')['discount']) / 100 }}</b></span>
                                            </p>
                                        @else
                                            {{ cart::total() }}
                                        @endif

                                    </div>

                                    <h3 class="mt-2">Paiement</h3>
                                    <label for="fname">Mode de paiement</label>
                                    <div class="icon-container">
                                        <p>Stripe <i class="fa fa-cc-visa" style="color:navy;"></i></p>
                                        {{-- <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i> --}}
                                    </div>
                                    
                                    <div id="payment_method" name="payment_method" type="hidden">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                    {{-- </div> --}}
                                </div>

                            </div>

                            <label>
                                <input type="checkbox" name="check" value="check"> Enregistrer ces informations pour
                                faciliter mes
                                prochaines réservations.
                            </label>
                            <label>
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <input type="checkbox" name="checkCondition" class="zen-icon_ic_open-in-new" value="check"
                                    required>
                                <a href="http://" target="_blank" rel="noopener noreferrer">
                                    J'accepte les conditions générales d'utilisation du service </a>
                                <span style="color:  rgba(235,81,96,0.8)">&nbsp;*</span>
                            </label>
                            <label>
                                <input type="checkbox" name="check" value="check"> Je souhaite recevoir les actualités et
                                programmation du restaurant par email.
                            </label>
                            <button id="submit-btn" type="submit" value="proceder au payer"
                                class="btn">payer</button>
                        </form>
                    </div>
                </div>

                {{-- <div class="col-25">
            
                </div> --}}

            </div>
        </div>
    </section>
    {{-- WITH CHARGE --}}


    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe(
            "{{ env('STRIPE_KEY') }}"
        );
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        // Submit the form with the token ID.
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
