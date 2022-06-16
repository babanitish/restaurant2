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
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('status'))
            <div class="alert alert-success">
                {{Session::get('status')}}
            </div>
        @endif
            <h1>Edit coupon</h1>
             <form action="{{route('update_coupon', $coupon->id)}}" method="POST">
                @csrf
                 <div class="form-column ">
                     <div class="col-md-6 mb-3">
                         <label for="coupon_name">coupon name</label>
                         <input type="text" value="{{$coupon->name}}" value="{{$coupon->name}}" name="coupon_name" class="form-control" id="coupon name" placeholder="enter coupon name" >
                         
                     </div>
                     <div class="col-md-6 mb-3">
                         <label for="coupon price">coupon discount</label>
                         <input type="number" value="{{$coupon->discount}}" value="{{$coupon->discount}}" name="coupon_discount" class="form-control" id="coupon discount" placeholder="enter coupon discount" >
                     </div>
                    
                     <div class="col-md-6 mb-3">
                         <label for="coupon_validity">coupon validity</label>
                         <input type="date" value="{{$coupon->validity}}" value="{{$coupon->validity}}" name="coupon_validity" class="form-control" id="coupon validity" placeholder="enter coupon validity" >
                         {{-- <input type="text" class="form-control" id="product category" placeholder="enter category" value="" required> --}}
                         
                     </div >
                    
                 </div>
                 <button class="btn btn-primary" type="submit">update</button>
             </form>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>
