<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">
        @include('admin.navbar')


        @include('admin.header')
        <div class="main-panel">
            <table class="table">
                <thead>
                    <tr>
                        
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Tél</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->usertype}}</td>

                        <td>
                            <a href="#" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                <span><strong>Delete</strong></span>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>
