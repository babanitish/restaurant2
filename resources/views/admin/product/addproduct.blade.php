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
            <h1>Product</h1>
            {{-- <div class="row"> --}}
            <form action="{{ route('saveproduct') }}" method="POST" enctype="multipart/form-data" name="formName">
                @csrf
                <div class="row ">
                    <div class="col mt-4">
                        <div class="col-md-10 mb-3">
                            <label for="product_name">product name</label>
                            <input type="text" name="product_name" class="form-control" id="product name"
                                placeholder="enter product name" required>

                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="product price">product price</label>
                            <input type="number" name="product_price" class="form-control" id="product price"
                                placeholder="enter product price" required>
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="product description">product description</label>
                            <input type="text" name="product_description" class="form-control"
                                id="product_description" placeholder="enter product description" required>
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="allergene">Allergènes</label>
                            <input type="text" name="allergene" class="form-control"
                                id="allergene" placeholder="enter allergene" required>
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
                            <input type="file" name="image" placeholder="choose image">
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="col-md-10 ">
                            <label for="energy">Valeurs égergétiques</label>
                            <input type="number" name="energy" class="form-control" id="energy"
                                placeholder="enter valeur " required>
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="gras">Matières grasses</label>
                            <input type="number" name="gras" class="form-control" id="gras"
                                placeholder="enter valeur " required>
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="proteine">proteines</label>
                            <input type="number" name="proteine" class="form-control" id="proteine"
                                placeholder="enter valeur " required>
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="glucide">Glucides</label>
                            <input type="number" name="glucide" class="form-control" id="glucide"
                                placeholder="enter valeur " required>
                        </div>
                        <div class="col-md-10 mb-3">
                            <label for="sel">Sel</label>
                            <input type="number" name="sel" class="form-control" id="sel" placeholder="enter valeur "
                                required>
                        </div>
                    </div>


                </div>
                <div class="d-flex justify-content-center" style="margin-right: 100px;">
                    <button class="btn btn-success btn-lg" type="submit">save</button>

                </div>
            </form>
            {{-- </div> --}}



        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>
