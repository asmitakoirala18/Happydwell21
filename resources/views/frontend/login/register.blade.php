@extends("frontend.master.master")

@section('content')
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <h1>Create new account</h1>
                    @include('backend.layouts.messages')
                </div>
                <div class="col-md-12">
                    <form action="{{route('buyer-register')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full name:
                                        <a style="color: red;">{{$errors->first('name')}}</a>
                                    </label>
                                    <input type="text" name="name" value="{{old('name')}}" id="name"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username:
                                        <a style="color: red;">{{$errors->first('username')}}</a>
                                    </label>
                                    <input type="text" name="username" value="{{old('username')}}" id="username"
                                           class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email">Email:
                                <a style="color: red;">{{$errors->first('email')}}</a>
                            </label>
                            <input type="text" name="email" id="email"
                                   value="{{old('email')}}"
                                   class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password:
                                        <a style="color: red;">{{$errors->first('password')}}</a>
                                    </label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password:
                                        <a style="color: red;">{{$errors->first('password_confirmation')}}</a>
                                    </label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender:
                                        <a style="color: red;">{{$errors->first('gender')}}</a>
                                    </label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" selected readonly>--- Select gender ---</option>
                                        <option value="male" {{old('gender')=='male' ?'selected':''}}>Male</option>
                                        <option value="female" {{old('gender')=='female' ?'selected':''}}>Female</option>
                                        <option value="others" {{old('gender')=='others' ?'selected':''}}>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile_picture">Profile Picture:
                                        <a style="color: red;">{{$errors->first('image')}}</a>
                                    </label> <br>
                                    <input type="file" name="image" class="btn btn-default">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-success">Register</button>
                        </div>
                    </form>

                    <hr>

                    <a href="{{route('login')}}">Login</a>
                </div>
            </div>
        </div>
    </section>
@endsection
