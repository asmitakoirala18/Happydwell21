@extends("frontend.master.master")


@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{$serviceData->title}}</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('index')}}">Home</a>
                            </li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Property Grid Star /-->
    <section class="property-grid grid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{url('uploads/service/'.$serviceData->image)}}"
                         class="img-fluid"
                         alt="">
                    {!! $serviceData->description !!}
                </div>
            </div>

        </div>
    </section>
    <!--/ Property Grid End /-->

@endsection
