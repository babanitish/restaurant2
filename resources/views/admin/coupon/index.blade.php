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

            <table class="table">
                <thead style="color: red">
                    {{-- @if (Session::has('status'))
                        <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif --}}

                    <tr>
                        <th scope="col"> name</th>
                        <th scope="col"> discount</th>
                        <th scope="col">validity</th>
                        <th scope="col">status</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->name }}</td>
                            <td>{{ $coupon->discount }}%</td>
                            <td>{{Carbon\Carbon::parse($coupon->validity)->format('D, d F Y')}}</td>
                            <td><div class="pt-3">
                                @if ($coupon->validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                <a href="{{ route('desactiver_product', $coupon->id) }}" class="btn btn-success">valid</a>
                                @else
                                <a href="{{ route('activer_product', $coupon->id) }}" class="btn btn-danger">invalid</a>                                        
                                @endif
                            </div></td>

                            <td>
                                <div>
                                    <a href="{{ route('edit_coupon', $coupon->id) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span><strong>Edit</strong></span>
                                    </a>

                                    <a href="{{ route('delete_coupon', $coupon->id) }}"
                                        class="btn btn-primary a-btn-slide-text">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        <span><strong>Delete</strong></span>
                                    </a>
                                </div>
                                

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{$products->links()}} --}}



        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>
