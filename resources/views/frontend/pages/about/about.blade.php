@extends("frontend.master.master")

@section('content')
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">About US</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                About Us
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Contact Star /-->
    <section class="contact">
        <div class="container">
            <div class="row">
                @foreach($aboutData as $about)
                    <div class="col-md-12">
                        <h1>{{$about->title}}</h1>
                        <hr>
                        @if($about->image)
                            <img src="{{url('uploads/about-us/'.$about->image)}}" class="img-fluid" alt="">
                        @else
                            <img src="{{url('uploads/errors/not-found.jpg')}}" class="img-fluid" alt="">


                        @endif


                        <p>
                            {!! $about->description !!}
                        </p>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
    <!--/ Contact End /-->

@endsection
