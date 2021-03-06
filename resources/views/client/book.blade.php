@extends('client_layout.head_foot')
@section('title')
    book
@endsection
@section('content')
    <!-- book section -->
    <section class="book_section layout_padding">
        @if (Session::has('status'))
        <div class="alert alert-success">
            {{Session::get('status')}}
        </div>
    @endif
        <div class="container ">
            <div class="heading_container align-items-center">
                <h2>
                    Réserver une Table
                </h2>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6 ">
                    <div class="form_container">
                        <form action="{{ route('book') }}" method="POST" id="reservation">

                            @csrf
                            <div>
                                <input type="text" name="name" class="form-control name" placeholder="Votre nom" required />
                                <span class="text-danger error-text name_error"></span>  
                            </div>
                            <div>
                                <input type="text" name="phone" class="form-control phone" placeholder="votre numéro"
                                    required />
                                    <span class="text-danger error-text phone_error"></span>
                            </div>
                            <div>
                                <input type="email" name="email" class="form-control email" placeholder="Votre mail"
                                    required />
                                    <span class="text-danger error-text email_error"></span>
                            </div>
                            <div>
                                <input type="number" name="guest" min="1" class="form-control nice-select wide guest"
                                    placeholder="nombre de persone" required/>
                                    <span class="text-danger error-text guest_error"></span>
                            </div>
                            <div>
                                <input type="time" name="time" class="form-control time"
                                    class="form-control nice-select wide" required/>
                                    <span class="text-danger error-text time_error"></span>
                            </div>
                            <div>
                                <input type="date" name="date" class="form-control date"
                                    class="form-control nice-select wide date" required/>
                                    <span class="text-danger error-text date_error"></span>
                            </div>
                            <div>
                                <fieldset>
                                    <textarea name="message" id="message" class="message" cols="59" rows="5"></textarea>
                                </fieldset>
                            </div>
                            
                            <a href="{{ route('cgu') }}" target="_blank" rel="noopener noreferrer"
                            style="color:black;text-decoration: underline;">En savoir plus sur
                            la gestion de vos données et vos droits</a>


                        <p>Les données collectées peuvent également nous permettre de vois adresser par e-mail des
                            publicités.</p>

                        <p>Pour le permettre, vous devez cocher les cases ci-dessous : </p>

                        <label>
                            <input type="checkbox" name="check" value="check"> Être recontacté par le restaurant dans le
                            cadre de ma demande
                        </label>

                        <label>
                            <input type="checkbox" name="checkCondition" class="zen-icon_ic_open-in-new" value="check">
                            Recevoir des offres commerciales de notre part par voie électronique
                        </label>

                        <label>
                            <input type="checkbox" name="check" value="check"> j'accepte de recevoir, par e-mail, de la
                            publicité de la part des partenaires.
                        </label>

                        <div class="btn_box d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-success btn-lg book">
                                Réserver maintenant
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>

    </section>
    <!-- end book section -->
@endsection
