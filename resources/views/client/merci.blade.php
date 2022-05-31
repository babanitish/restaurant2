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
    <div>
        {{-- <p>Votre commande a été faite </p> --}}
        <form action="{{route('mes_commandes')}}" method="get">
        <button class="btn btn-success">voir mes commandes</button>
        </form>
    </div>

    <!-- end food section -->
@endsection
