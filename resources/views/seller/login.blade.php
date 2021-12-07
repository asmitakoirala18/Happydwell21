<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Login</title>
    <link href="{{url('seller-assets/assets/css/bootstrap.css')}}" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="{{url('seller-assets/assets/css/font-awesome.css')}}" rel="stylesheet"/>
    <!-- MORRIS CHART STYLES-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 100px;">
            <div class="panel panel-primary">
                <div class="panel-heading">Seller Login</div>
                <div class="panel-body">
                    @include('backend.layouts.messages')

                    <form action="{{route('seller-login')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="username">Username:
                                <a style="color: red;">{{$errors->first('username')}}</a>
                            </label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:
                                <a style="color: red;">{{$errors->first('password')}}</a>
                            </label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Login</button>
                            <a href="{{route('seller-register')}}" class="pull-right">Register</a>
                        </div>
                    </form>



                    <a href="{{route('seller-password-reset')}}" style="color: red;">Password reset</a>

                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
