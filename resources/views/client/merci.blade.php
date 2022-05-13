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
        <p>Votre commande a été faite </p>

    <!-- end food section -->
@endsection
