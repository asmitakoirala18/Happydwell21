<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page not found</title>
    <link href="{{url('frontend-assets/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="col-md-4 offset-4" style="margin-top: 100px;">
        <a href="{{route('index')}}">
            <img src="{{url('uploads/errors/404.jpg')}}" class="img-fluid" alt="">
        </a>
        <a href="{{route('index')}}" style="margin-top: 10px;" class="btn btn-success">Goto home page</a>

    </div>
</div>

</body>
</html>
