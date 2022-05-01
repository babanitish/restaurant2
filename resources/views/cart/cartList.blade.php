@extends('client_layout.head_foot')
@extends('cart.cartCss')

@section('content')
    <div class="container py-5 ">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                        <h6 class="mb-0 text-muted">3 items</h6>
                                    </div>
                                    <hr class="my-4">
                                    @foreach ($cartItems as $item)
                                        <div class="row mb-4 d-flex justify-content-between align-items-center  product_data">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="{{asset('storage/product_images/' . $item->product->poster_url)}}"
                                                    class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">{{$item->product->name}}</h6>
                                                {{-- <h6 class="text-black mb-0">Cotton T-shirt</h6> --}}
                                            </div>
                                            
                                            <input type="hidden" class="product_id" name="product_id" value="{{$item->product_id}}">
                                            
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex quantity ">
                                                {{-- <button class="btn btn-link decrement"><i class="fas fa-minus"></i></button> --}}
                                                <input class="form-control qty-input text-center " name="quantity" id="quantity" type="number" value="{{$item->quantity}}"/>
                                                {{-- <button class="btn btn-link px-2 increment" ><i class="fas fa-plus"></i></button> --}}
                                            </div>
                                          
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0">{{$item->product->price}}</h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end ">
                                                <button class="btn btn-danger delete-cart"><i class="fas fa-trash"></i></button>
                                                {{-- <a  href="{{ url('delete-cart', $item->product_id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr class="my-4">

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="{{('/menu')}}" class="text-body"><i
                                                    class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">items 3</h5>
                                        <h5>€ 132.00</h5>
                                    </div>

                                    <h5 class="text-uppercase mb-3">Shipping</h5>

                                    <div class="mb-4 pb-2">
                                        <select class="select">
                                            <option value="1">Standard-Delivery- €5.00</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                        </select>
                                    </div>

                                    <h5 class="text-uppercase mb-3">Give code</h5>

                                    <div class="mb-5">
                                        <div class="form-outline">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea2">Enter your code</label>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5>€ 137.00</h5>
                                    </div>

                                    <button type="button" class="btn btn-dark btn-block btn-lg"
                                        data-mdb-ripple-color="dark">Register</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection