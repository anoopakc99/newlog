


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Javascript seching css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
<a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
    <div class="container mt-5">
        @if (Session::has('msg'))
        <div class="alert alert-success">
            <p>{{Session ('msg') }}</p>
        </div>
        @endif
        <form action="{{url('store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Name">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <hr>

    <!-- Searching bar -->

    <div class="col-md-10">
        <div class="form-inline float-right">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" id="myInput" placeholder="Search" aria-label="Search">
                <div class="input-group-append">

                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Searching bar end -->
    <div class="container mt-3">
        <table class="table table-bordered ">
            <tr class="table-danger ">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Modify</th>
                <th>Action</th>
            </tr>
            <tbody id="myTable">
                @foreach ($data as $list)
                <tr>

                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->phone}}</td>
                    <td>
                        <img src="{{asset('uploads/'.$list->image)}}" width="100px" alt="">
                    </td>

                    <td>

                        <a href="{{ url('form/edit', $list->id) }}" class="label label-warning btn btn-success">Edit</a>
                    </td>
                    <td>

                        <a href="{{url('form.destroy', $list->id)}}" class="btn rounded-5 btn-danger mb-0 mx-1 px-4 mb-0" onclick="return confirm('Are you sure you want to delete this Category');">Delete</a>
                    </td>
                </tr>
                @endforeach


            </tbody>

        </table>
       
    </div>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>