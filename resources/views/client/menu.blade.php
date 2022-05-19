@extends('client_layout.head_foot')
@section('title')
    menu
@endsection
@section('content')
    <!-- food section -->
    @if (Session::has('status'))
        <div class="alert alert-success">
            {{ Session::get('status') }}
        </div>
    @endif

    <section class="food_section layout_padding-bottom">

        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Nos produits
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="{{ request()->is('/menu') ? 'active' : '' }}"><a href="{{ url('/menu') }}">All</a></li>
                @foreach ($categories as $category)
                    <li class="{{ request()->is('select_par_category/' . $category->name) ? 'active' : '' }}">
                         <a href="{{ url('select_par_category', $category->id) }}">
                            {{ $category->name }}</a> </li>
                @endforeach
            </ul>
    
            <div class="filters-content">
                <div class="row grid">
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-lg-4 all " id="product_data"> {{-- all burger --}}

                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img src="{{ asset('product_poster/' . $product->poster_url) }}" alt="  {{ $product->name }}">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            {{ $product->name }}
                                        </h5>
                                        <p>
                                            {{ $product->description }}
                                        </p>
                                        <div class="options">
                                            <h6>
                                                {{ $product->price }}$
                                            </h6>
                                            <form action="{{ route('ajout') }}" method="post">
                                                @csrf
                                                <input type="hidden" class="prod_id" name="id" value="{{ $product->id }}">
                                                <input type="hidden" class="" name="name" value="{{ $product->name }}">
                                                <input type="hidden" class="" name="price" value="{{ $product->price}}">

                                                {{-- addToCart --}}
                                                {{-- data-toggle="modal" data-target="#exampleModal" --}}
                                                <button class="btn btn-warning " id="{{ $product->id }}"><i
                                                        class="fa-solid fa-cart-shopping"></i>ADD</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>

            {{-- <div class="btn-box">
                <a href="">
                    View More
                </a>
            </div> --}}
        </div>
    </section>

    <!-- end food section -->
@endsection
