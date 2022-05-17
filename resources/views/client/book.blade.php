@extends('client_layout.head_foot')
@section('title')
    book
@endsection
@section('content')
    <!-- book section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Book A Table
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    
                    <form action="{{ route('book') }}" method="POST">

                        @csrf
                        <div>
                            <input type="text" name="name" class="form-control name" placeholder="Your Name" required />
                        </div>
                        <div>
                            <input type="text" name="phone" class="form-control phone" placeholder="Phone Number"
                                required />
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control email" placeholder="Your Email" required />
                        </div>
                        <div>
                            <input type="number" name="guest" class="form-control nice-select wide guest"
                                placeholder="number of person" />
                        </div>
                        <div>
                            <input type="time" name="time" class="form-control time"
                                class="form-control nice-select wide" />
                        </div>
                        <div>
                            <input type="date" name="date" class="form-control date"
                                class="form-control nice-select wide date" />
                        </div>
                        <div>
                            <fieldset>
                                <textarea name="message" id="message" class="message" cols="57" rows="5"></textarea>
                            </fieldset>
                        </div>
                        <div class="btn_box">
                            <button type="submit" class="btn btn-success book">
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="col-md-6">
                    <div class="map_container ">
                        <div id="googleMap"></div>
                    </div>
                    </div> --}}
        </div>

    </section>
    <!-- end book section -->
@endsection
