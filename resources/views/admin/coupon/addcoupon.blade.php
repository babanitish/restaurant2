<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">
        @include('admin.navbar')


        @include('admin.header')
        <div class="content-wrapper mt-5">
            @if (count($errors) > 0)
                <div class="allert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- @if (Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
            @endif --}}
            <h1>Product</h1>
            <form action="{{ route('savecoupon') }}" method="POST">
                @csrf
                <div class="form-column ">
                    <div class="col-md-6 mb-3">
                        <label for="coupon_name">coupon name</label>
                        <input type="text" name="coupon_name" class="form-control" id="coupon name"
                            placeholder="enter product name">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="coupon discount">coupon discount %</label>
                        <input type="number" min="1" name="coupon_discount" class="form-control" id="coupon discount"
                            placeholder="enter coupon discount">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="coupon validity">coupon validity</label>
                        <input type="date" min="{{Carbon\Carbon::now()->format('y/m/d')}}" name="coupon_validity" class="form-control" id="coupon validity"
                            placeholder="enter coupon validity">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">save</button>
            </form>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>
