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
            
            {{ Form::hidden('', $increment = 1) }}
            <table class="table">
                <thead>
                    @if (Session::has('status'))
                    <div class="alert alert-success">
                        {{ Session::get('status') }}
                    </div>
                @endif
            
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">product name</th>
                        <th scope="col">product price</th>
                        <th scope="col">product category</th>
                        <th scope="col">product image</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $increment }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td><img src="{{asset('storage/product_images/'.$product->poster_url)}}" alt=""></td>

                            <td>

                                <a href="{{ route('edit_category', $product->id) }}"
                                    class="btn btn-primary a-btn-slide-text">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    <span><strong>Edit</strong></span>
                                </a>

                                <a href="{{ route('delete_category', $product->id) }}"
                                    class="btn btn-primary a-btn-slide-text">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    <span><strong>Delete</strong></span>
                                </a>
                            </td>
                        </tr>
                        {{Form::hidden('',$increment = $increment + 1)}}
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>
