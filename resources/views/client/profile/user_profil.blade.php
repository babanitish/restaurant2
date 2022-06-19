@extends('client_layout.head_foot')
{{-- @section('title')
menu
@endsection --}}
@section('content')
    <h2 class="d-flex justify-content-center">Bienvenue {{ Auth::user()->name }}</h2>

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ Auth::user()->name }}</h5>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                   
                                    <a href="{{ route('dashboard') }}" class="mb-0">Accueil</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    
                                    <a href="{{route('my_order')}}" class="mb-0">vos commandes</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a href="{{ route('user.mdp') }}" class="mb-0">Mettre à jour son
                                        mot de passe</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a href="{{ route('user.profil') }}" class="mb-0">Mettre à jour ses
                                        données</a>
                                </li>
                               
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    
                                    <a href="{{ route('user.logout') }}" class="mb-0">Se déconnecter</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('profil.update') }}">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Nom</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <x-input id="" class="block mt-1 w-full" type=""
                                            name="name" autocomplete="new-password" value="{{ auth()->user()->name }}"/>                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <x-input id="" class="block mt-1 w-full" type=""
                                            name="email" autocomplete="new-password" value="{{ auth()->user()->email }}"/>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Tél</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <x-label for="phone" />
                                            <x-input id="phone" class="block mt-1 w-full" type="text"
                                                name="phone" autocomplete="phone number" value="{{ auth()->user()->phone }}"/>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Adresse</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <x-label for="address" />
                                            <x-input id="address" class="block mt-1 w-full" type="text"
                                                name="address" autocomplete="addressd" value="{{ auth()->user()->address }}"/>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-warning">modifier</button>
                                </div>
                            </form>
                        </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
