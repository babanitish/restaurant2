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
                    <div class="form_container">
                        <form action="{{ route('reservation') }}" method="post">
                            @csrf
                            <div>
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required />
                            </div>
                            <div>
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required />
                            </div>
                            <div>
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required />
                            </div>
                            <div>
                                <input type="number" name="guest" class="form-control nice-select wide"
                                    placeholder="number of person" />
                            </div>
                            <div>
                                <input type="time" name="time" class="form-control"
                                    class="form-control nice-select wide" />
                            </div>
                            <div>
                                <input type="date" name="date" class="form-control"
                                    class="form-control nice-select wide" />
                            </div>
                            <div>
                                <fieldset>
                                    <textarea name="message" id="message" cols="57" rows="5"></textarea>
                                </fieldset>
                            </div>
                            <div class="btn_box">
                                <button type="submit">
                                    Book Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map_container ">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->
@endsection
