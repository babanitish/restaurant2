@extends('client_layout.head_foot')
@section('title')
    menu
@endsection
@section('content')
    <!-- food section -->
    {{-- @if (Session::has('status'))
        <div class="alert alert-success">
            {{ Session::get('status') }}
        </div>
    @endif --}}

    <section class="food_section layout_padding-bottom">

        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Nos produits
                </h2>
            </div>

            <ul class="filters_menu  category">
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/menu') }}">Tout</a></li>

                @foreach ($categories as $category)
                    <input type="hidden" value="{{ $category->id }}" id="cat">
                    <li class="{{ request()->is('select_par_category/' . $category->id) ? 'active' : '' }}"
                        value="{{ $category->id }}">
                        <a href="{{ url('/select_par_category', $category->id) }}" id="catId"
                            value="{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
  
           
          
            <div class="filters-content">
                <div class="row grid">
                    @foreach ($products as $product)
                    
                        <div class="col-sm-6 col-lg-4 all " id="product_data"> {{-- all burger --}}

                            <div class="box" style="height: 450px">
                                <div>
                                    <div class="img-box">
                                        <a href="{{route('product.show', $product->id)}}"><img src="{{ asset('product_poster/' . $product->poster_url) }}" alt="  {{ $product->name }}"></a> 

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
                                                {{ $product->price }}€
                                            </h6>
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
    <button type="button" class="btn btn-warning btn-floating btn-lg" id="btn-back-to-top" style="position: fixed;bottom:20px;right:20px;display:none;">
        Haut
    </button>
    <script>
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 1000
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 300;
        }
    </script>
    <!-- end food section -->
@endsection
