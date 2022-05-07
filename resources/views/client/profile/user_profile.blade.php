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
                            {{-- <p class="text-muted mb-1">Full Stack Developer</p>
                            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary">Follow</button>
                                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <a href="" class="mb-0">Home</p>
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
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.update') }}">
                                @method('PUT')
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <div>
                                            <x-label for="name" :value="__('Name')" />
                                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                                value="{{ auth()->user()->name }}" autofocus />
                                        </div>
                                        <div>
                                            <x-label for="email" :value="__('Email')" />
                                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                                value="{{ auth()->user()->email }}" autofocus />
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <x-label for="new_password" :value="__('New password')" />
                                            <x-input id="new_password" class="block mt-1 w-full" type="password" name="password"
                                                autocomplete="new-password" />
                                        </div>
                                        <div>
                                            <x-label for="confirm_password" :value="__('Confirm password')" />
                                            <x-input id="confirm_password" class="block mt-1 w-full" type="password"
                                                name="password_confirmation" autocomplete="confirm-password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-3">
                                        {{ __('Update') }}
                                    </x-button>
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
