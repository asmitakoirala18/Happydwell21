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
                    <form action="" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="password">Password:
                                <a style="color: red;">{{$errors->first('password')}}</a>
                            </label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password:
                                <a style="color: red;">{{$errors->first('password_confirmation')}}</a>
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Reset password</button>
                            <a href="{{route('seller-login')}}" class="pull-right">Register</a>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
