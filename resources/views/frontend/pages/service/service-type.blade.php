@extends("frontend.master.master")


@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{$serviceTypeData->type}}</h1>
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
                    {!! $serviceTypeData->description !!}
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                @foreach($serviceTypeData->getAllServiceData as $service)
                    <div class="col-md-8">
                        <h2><a href="{{route('service-details',$service->slug)}}">{{$service->title}}</a></h2>
                        <p>
                            {!! $service->description !!}
                        </p>

                    </div>
                    <div class="col-md-4" style="margin-top: 20px;">
                        <a href="{{route('service-details',$service->slug)}}">
                        <img src="{{url('uploads/service/'.$service->image)}}" alt=""
                             class="img-a img-fluid">
                        </a>

                    </div>


                @endforeach

            </div>
        </div>
    </section>
    <!--/ Property Grid End /-->

@endsection
