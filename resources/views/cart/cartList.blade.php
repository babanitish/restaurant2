@extends('client_layout.head_foot')
@extends('cart.cartCss')

@section('content')
    @if (Cart::count() > 0)
        <div class="container py-5 ">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <form action="{{ route('vider') }}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger">Vider</button>
                                            </form>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Panier</h1>
                                        </div>

                                        <hr class="my-4">

                                        @foreach (cart::content() as $product)
                                            <div
                                                class="row mb-4 d-flex justify-content-between align-items-center product_data ">

                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="{{ asset('product_poster/' . $product->options['poster_url']) }}"
                                                        class="img-fluid rounded-3" alt="{{ $product->name }}">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3 py-2">
                                                    <h6 class="text-muted">{{ $product->name }}</h6>
                                                    {{-- <h6 class="text-black mb-0">Cotton T-shirt</h6> --}}
                                                </div>

                                                <input type="hidden" class="product_id" name="product_id"
                                                    value="{{ $product->id }}">

                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex justify-content-center ">
                                                    <button class="btn btn-link decrement updateQuantity"><i
                                                            class="fas fa-minus"></i></button>
                                                    <input class="form-control qty-input text-center " name="qty" id="qty"
                                                        type="text" value="{{ $product->qty }}"
                                                        data-id="{{ $product->rowId }}" />
                                                    <input type="hidden" class="rowId"
                                                        value="{{ $product->rowId }}" />
                                                    <button class="btn btn-link px-2 increment updateQuantity"><i
                                                            class="fas fa-plus"></i></button>
                                                </div>

                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 price py-2">
                                                    <h6 class="mb-0">{{ $product->price }}</h6>
                                                </div>
                                                <div
                                                    class="col-md-1 col-lg-1 col-xl-1 py-2 text-end d-flex justify-content-center">
                                                    <form action="{{ route('cart.destroy', $product->rowId) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger "><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                        <hr class="my-4">

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="{{ '/menu' }}"
                                                    class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Menu</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Sommaire</h3>
                                        <hr class="my-4">

                                        {{-- <div class="d-flex justify-content-between mb-4">
                                    <h5 class="text-uppercase">items 3</h5>
                                    <h5></h5>
                                </div> --}}
                                        @if (Session::has('coupon'))
                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">coupon</h5>
                                                <h5>{{ session()->get('coupon')['name'] }}</h5>
                                            </div>
                                            <form action="{{route('coupon.destroy')}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="d-flex justify-content-between mb-5">
                                                    <h5 class="text-uppercase">remise
                                                     <strong>{{ session()->get('coupon')['discount'] }}% </strong></h5>

                                                    <button type="submit" class="btn btn-danger "><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                            </form>
                                        @else
                                        <form action="{{route('apply_coupon')}}" method="get">
                                            @csrf
                                            <h5 class="text-uppercase mb-3">Code Promo</h5>

                                            <div class="mb-5">
                                                <div class="form-outline">
                                                    <input type="text" id="form3Examplea2"
                                                        class="form-control form-control-lg coupon_name" name="coupon_name"
                                                        id="coupon_name" />
                                                    <button type="submit" class="btn btn-outline-success mt-3   btnCoupon" >Apply</button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        @endif



                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total</h5>
                                            @if (session::has('coupon'))
                                            <h5>€ {{ (Cart::total())-(Cart::total() * session()->get('coupon')['discount'] / 100)}}</h5>    
                                            @else
                                                <h5>{{Cart::total()}}</h5>
                                            @endif
                                            
                                        </div>

                                        <a href="{{ route('checkout.index') }}"
                                            class="btn btn-outline-success btn-block btn-lg"
                                            data-mdb-ripple-color="dark">checkout</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="col-md-12 text-center text-bold display-3"> Votre panier est vide</p>
    @endif
@endsection
