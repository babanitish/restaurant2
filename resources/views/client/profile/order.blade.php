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
                               <a href="{{ route('dashboard') }}" class="mb-0">Accueil</a>
                           </li>
                           <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                               <a href="{{ route('my_order') }}" class="mb-0">vos commandes</a>
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
           {{-- @if (count($order) > 0) --}}
           <div class="col-lg-8">
               <div class="card mb-4">
                   <div class="card-body">
                       <h3 class="text-center">Vos commandes</h3>
                   
                       <div class="row">
                         
                           <table class="table">
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
                                               <a href="{{route('order_view',$item->id)}}" class="btn btn-warning a-btn-slide-text">
                                                   <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                   <span><strong>Détails</strong></span>
                                               </a>
                                           </td>
                                       </tr>
                                   @endforeach

                               </tbody>
                           </table>
                       </div>
                       <hr>

                   </div>
               </div>
           </div>
       </div>
   </div>
   </div>
</section>
   {{-- @else
   <div class="row align-self-center" style="height: 300px;vertical-align: middle;">
    <p class="col-md-12 text-center text-bold display-3 mt5">Vous n'avez pas de commande</p>

   </div>
   @endif --}}
@endsection
