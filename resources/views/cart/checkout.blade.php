@extends('client_layout.head_foot')


@section('content')
    <div class="container">

        <div class="row">
            <form action="{{url('place-order')}}" method="POST" class="needs-validation" novalidate="">
                {{ csrf_field() }}
                <div class="col-md-6 order-md-2 mb-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                            </h4>
                            @php
                                $total = 0;
                            @endphp
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>quantity</th>
                                        <th>price</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->product->price }}</td>

                                        </tr>
                                        @php
                                            $total += $item->product->price * $item->quantity;
                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>

                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <strong>€ {{ $total }}</strong>
                            </li>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 order-md-1">
                    <h4 class="mb-3">Billing address</h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">name</label>
                            <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="{{Auth::user()->name}}" required>
                            <div class="invalid-feedback"> Valid first name is required. </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" placeholder="you@example.com">
                        <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}" placeholder="1234 Main St" required>
                        <div class="invalid-feedback"> Please enter your shipping address. </div>
                    </div>
                    <div class="mb-3">
                        <label for="number">phone</label>
                        <input type="number" class="form-control" id="number" name="number" value="{{Auth::user()->phone}}" placeholder="04-55-66-77-88" required>
                        <div class="invalid-feedback"> Please enter your shipping address. </div>
                    </div>
                    {{-- <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                    </div> --}}

                    <hr class="mb-4">

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <hr class="mb-4">
                    {{-- <h4 class="mb-3">Payment</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked=""
                                required="">
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback"> Name on card is required </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                            <div class="invalid-feedback"> Credit card number is required </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                            <div class="invalid-feedback"> Expiration date required </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                            <div class="invalid-feedback"> Security code required </div>
                        </div>
                    </div> --}}
                    <hr class="mb-4">
                    <button class="btn btn-outline-success btn-block btn-lg" type="submit">Continue to checkout</button>

                </div>
            </form>
        </div>
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2019 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
@endsection
