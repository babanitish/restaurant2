@extends('client_layout.head_foot')
@section('title')
menu
@endsection
@section('content')

  <!-- food section -->


  <section class="food_section layout_padding-bottom">
       
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our Menu
            </h2>
        </div>

        {{-- <ul class="filters_menu">
            <li class="active" data-filter="*">All</li>
            <li data-filter=".burger">Burger</li>
            <li data-filter=".pizza">Pizza</li>
            <li data-filter=".pasta">Pasta</li>
            <li data-filter=".fries">Fries</li>
        </ul> --}}
        <ul class="filters_menu">
            <li class="{{request()->is('menu') ? 'active' : ''}}"><a href="{{ url('/menu') }}">All</a></li>
            @foreach ($categories as $category)
                <li class="{{request()->is('select_par_category/'.$category->name) ? 'active' : ''}}" > <a href="{{url('select_par_category', $category->id)}}" 
                    >
                     {{$category->name}}</a> </li>
            @endforeach
        </ul>
         {{-- @php
        dd($products)
    @endphp --}}
        <div class="filters-content">
            <div class="row grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-lg-4 all " id="product_data"> {{-- all burger --}}

                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="{{ asset('storage/product_images/' . $product->poster_url) }}"
                                        alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $product->name }}
                                    </h5>
                                    <p>
                                      {{ $product->description}}
                                    </p>
                                    <div class="options">
                                        <h6>
                                            {{ $product->price }}$
                                        </h6>
                                        <input type="hidden" class="prod_id" value="{{ $product->id }}">

                                        <button class="btn btn-warning addToCart"><i
                                          class="fa-solid fa-cart-shopping"></i>ADD</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
           

        </div>
         
        <div class="btn-box">
            <a href="">
                View More
            </a>
        </div>
    </div>
</section>

  <!-- end food section -->
@endsection