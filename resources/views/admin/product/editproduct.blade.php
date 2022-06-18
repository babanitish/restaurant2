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
            <h1>Edit product</h1>
             <form action="{{route('update_product', $product->id)}}" method="POST"  enctype="multipart/form-data" name="formName">
                @csrf
                <div class="row ">
                    <div class="col mt-4">
                        <div class="col-md-10 mb-3">
                            <label for="product_name">product name</label>
                            <input type="text" name="product_name" class="form-control" id="product name"
                                placeholder="enter product name" value="{{$product->name}}">

                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="product price">product price</label>
                            <input type="number" name="product_price" class="form-control" id="product price"
                                placeholder="enter product price" value="{{$product->price}}">
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="product description">product description</label>
                            <input type="text" name="product_description" class="form-control"
                                id="product_description" placeholder="enter product description" value="{{$product->description}}">
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="allergene">Allergènes</label>
                            <input type="text" name="allergene" class="form-control"
                                id="allergene" placeholder="enter allergene" value="{{$product->allergene}}">
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="product_category">product category</label>
                            <select id="inputState" name="product_category" class="form-control" required>
                                <option selected>Choose...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-10 mb-3">
                            <label>Product image</label>
                            <input type="file" name="image" placeholder="choose image" value="{{$product->poster_url}}">
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="col-md-10 ">
                            <label for="energy">Valeurs égergétiques</label>
                            <input type="number" step="0.01" name="energy" class="form-control" id="energy"
                                placeholder="enter valeur " value="{{$product->nutrition->energy}}">
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="gras">Matières grasses</label>
                            <input type="number"step="0.01" name="gras" class="form-control" id="gras"
                                placeholder="enter valeur " value="{{$product->nutrition->fat}}">
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="proteine">proteines</label>
                            <input type="number"step="0.01" name="proteine" class="form-control" id="proteine"
                                placeholder="enter valeur " value="{{$product->nutrition->proteines}}">
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="glucide">Glucides</label>
                            <input type="number"step="0.01" name="glucide" class="form-control" id="glucide"
                                placeholder="enter valeur " value="{{$product->nutrition->glucides}}">
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="sel">Sel</label>
                            <input type="number"step="0.01" name="sel" class="form-control" id="sel" placeholder="enter valeur "
                            value="{{$product->nutrition->sel}}">
                        </div>
                    </div>


                </div>
                <div class="d-flex justify-content-center" style="margin-right: 100px;">
                    <button class="btn btn-success btn-lg" type="submit">update</button>

                </div>
             </form>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>
