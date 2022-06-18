@extends('client_layout.head_foot')
@extends('cart.cartCss')

@section('content')
    <section class="food_section layout_padding-bottom">
        <div class="container">

            <div class="filters-content ">
                <div class="row ">
                    <div class="pt-5">
                        <h6 class="mb-0 btn btn-warning"><a href="{{ '/menu' }}"
                                class="text-body"><i
                                    class="fas fa-long-arrow-alt-left me-2 "></i>Menu</a></h6>
                    </div>

                    <div class="col">
                        
                            <img src="{{ asset('product_poster/' . $product->poster_url) }}" style="margin-top: 200px;height: 300px;"
                                alt="  {{ $product->name }}">

                    </div>

                    <div class="col mt-4" style="left: 0px;">
                        <div class="col-sm-6 col-lg-8 all" id="product_data" style="margin-top: 80px;">
                            <div class="card text-white bg-dark mb-3" style="/*! max-width: 18rem; */height: 500px;width: 500px;">
                                <div class="card-header text-center">Détails</div>
                                <div class="card-body">
                                    <h5 class="card-title">Allergènes</h5>
                                    <p class="card-text">{{ $product->allergene ?? 'indisponible' }} </p>
                                    <h5 class="card-title mt-5">Valeurs nutritionnelles</h5>

                                    <p class="card-text">Valeurs énergétiques: {{$product->nutrition->energy}}Kcal</p>
                                    <p class="card-text">Matières grasses: {{$product->nutrition->fat}}g</p>
                                    <p class="card-text">Poteines: {{$product->nutrition->proteines}}g</p>
                                    <p class="card-text">Glucides: {{$product->nutrition->glucides}}g</p>
                                    <p class="card-text">Sel: {{$product->nutrition->sel}}g</p>

                                </div>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('ajout') }}" method="post">
                                        @csrf
                                        <input type="hidden" class="prod_id" name="id"
                                            value="{{ $product->id }}">
                                        <input type="hidden" class="" name="name"
                                            value="{{ $product->name }}">
                                        <input type="hidden" class="" name="price"
                                            value="{{ $product->price }}">
    
                                        {{-- addToCart --}}
                                        {{-- data-toggle="modal" data-target="#exampleModal" --}}
                                        <button class="btn btn-warning " id="{{ $product->id }}"><i
                                                class="fa-solid fa-cart-shopping"></i>Ajouter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
@endsection
