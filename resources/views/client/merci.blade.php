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
    <div style="height: 300px;width: auto;">
        <p class="col-md-12 text-center text-bold display-3"> Merci</p>
        <p class="col-md-12 text-center  display-4"> Votre commande a été traitée avec succès</p>
        <form action="{{route('my_order')}}" method="get">
            <button class="btn btn-success" style="margin-left:45%;width:8em;display:inline-block;">voir mes commandes</button>
            </form>
    </div>

    <!-- end food section -->
@endsection