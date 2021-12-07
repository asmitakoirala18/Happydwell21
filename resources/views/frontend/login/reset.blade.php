@extends("frontend.master.master")

@section('content')
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <h1 class="title-single">Password reset page</h1>

                    @include('backend.layouts.messages')

                </div>
                <div class="col-md-12">
                    <form action="{{route('buyer-password-rest')}}" method="post">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="email">Email:
                                <a style="color: red;">{{$errors->first('email')}}</a>
                            </label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="email">
                        </div>

                        <div>
                            <button class="btn btn-success">
                                <i class="fa fa-unlock"></i> Send
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
