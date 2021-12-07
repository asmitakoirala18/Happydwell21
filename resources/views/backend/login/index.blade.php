<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="{{url('backend-assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('backend-assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-assets/build/css/custom.min.css')}}" rel="stylesheet">

</head>
<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <div class="col-md-12">
                    @include('backend.layouts.messages')
                </div>
                <form action="{{route('admin-login')}}" method="post">
                    {{csrf_field()}}
                    <h1>Login Form</h1>
                    <div class="form-group">
                        <label for="username">Username:
                            <a style="color: red;">{{$errors->first('username')}}</a>
                        </label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:
                            <a style="color: red;">{{$errors->first('password')}}</a>
                        </label>
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Password">
                    </div>
                    <div>
                        <button class="btn btn-success">
                            <i class="fa fa-unlock"></i> Login</button>
                    </div>


                </form>

                <a href="{{route('admin-password-rest')}}">Password Reset</a>
            </section>
        </div>


    </div>
</div>
</body>
</html>
