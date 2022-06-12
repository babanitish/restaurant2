@extends('client_layout.head_foot')
{{-- @section('title')
menu
@endsection --}}
@section('content')
    <h2 class="d-flex justify-content-center">Bienvenue {{ Auth::user()->name }}</h2>
    @if (Session::has('status'))
        <div class="alert alert-success">
            {{ Session::get('status') }}
        </div>
    @endif
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
                                    <a href="{{ route('dashboard') }}" class="mb-0">Accueil</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <a href="{{ route('my_order') }}" class="mb-0">vos commandes</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <a href="{{ route('user.profil') }}" class="mb-0">Mettre à jour ses
                                        données</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <a href="{{ route('user.logout') }}" class="mb-0">Se déconnecter</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="text-center">Détails de la commande</h3>
                          
                            <div class="row">
                                @foreach ($order->orderProducts as $item)
                                 
                                    <div class="col-sm-3">
                                        <p class="mb-0">{{ $item->product->name }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $item->price }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $item->product->description }}</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">Qty: {{ $item->quantity }}</p>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset('product_poster/' . $item->product->poster_url) }}"
                                            class="img-fluid rounded-3" alt="{{ $item->product->name }}">
                                    </div>
                                @endforeach
                                {{-- <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Date Commande</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->address}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>
                                                    <a href="{{route('order_view',$item->id)}}" class="btn btn-primary a-btn-slide-text">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                        <span><strong>Détail</strong></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table> --}}
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
