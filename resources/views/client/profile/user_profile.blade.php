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
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <a href="{{ route('dashboard') }}" class="mb-0">Accueil</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <a href="" class="mb-0">vos commandes</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <a href="" class="mb-0">Profile Update</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <a href="" class="mb-0">change password</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <a href="{{ route('user.logout') }}" class="mb-0">logout</a>
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
                            <form method="POST" action="{{ route('profile.update') }}">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Nom</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Nouveau mot de passe</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <x-label for="new_password" />
                                            <x-input id="new_password" class="block mt-1 w-full" type="password"
                                                name="password" autocomplete="new-password" />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Confirmation mot de passe</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <x-label for="confirm_password" />
                                            <x-input id="confirm_password" class="block mt-1 w-full" type="password"
                                                name="password_confirmation" autocomplete="confirm-password" />
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-danger">modifier</button>
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
