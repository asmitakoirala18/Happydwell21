@extends("frontend.master.master")

@section('content')
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">

                    <h1 class="title-single">Login Page</h1>

                    @include('backend.layouts.messages')

                </div>
                <div class="col-md-12">
                    <form action="{{route('login')}}" method="post">
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
                        </div>
                    </form>

                    <hr>

                    <a href="{{route('buyer-register')}}">Create new account</a>
                    <a href="{{route('buyer-password-rest')}}" style="color: red;">Password reset</a>
                </div>
            </div>
        </div>
    </section>
@endsection
