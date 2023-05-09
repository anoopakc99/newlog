<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
    @if (Session::has('msg'))
                <div class="alert alert-success">
                    <p>{{Session ('msg') }}</p>
                </div>
                @endif
                <form action="{{ url('form/update', $list->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{$list->name}}" placeholder="Enter Name">
               
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{$list->email}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{$list->phone}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Image">
                <img src="{{asset('uploads/'.$list->image)}}" width="70px" hight="70px" alt="img">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <hr>

  
</body>

</html>