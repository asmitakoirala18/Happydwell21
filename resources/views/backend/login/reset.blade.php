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
                <form action="{{route('admin-password-rest')}}" method="post">
                    {{csrf_field()}}
                    <h1>Login Form</h1>
                    <div class="form-group">
                        <label for="email">Email:
                            <a style="color: red;">{{$errors->first('email')}}</a>
                        </label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="email">
                    </div>

                    <div>
                        <button class="btn btn-success">
                            <i class="fa fa-unlock"></i> Send</button>
                    </div>

                </form>
            </section>
        </div>


    </div>
</div>
</body>
</html>
