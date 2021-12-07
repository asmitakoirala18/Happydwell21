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
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Reset password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
