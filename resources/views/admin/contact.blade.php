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
                        <th scope="col">message</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($contacts as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->message}}</td>
                        <td>
                            <a href="{{route('delete_contact', $item->id)}}" class="btn btn-primary a-btn-slide-text">
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
