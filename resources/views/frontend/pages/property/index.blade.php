@extends("frontend.master.master")


@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Our Amazing Properties</h1>
                        <span class="color-text-a">Grid Properties</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Properties Grid
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
                <div class="col-sm-12">
                    <div class="grid-option">
                        <form action="{{route('property-filter')}}" method="post">
                            @csrf
                            <select name="criteria" class="custom-select" id="themes">
                                <option selected>All</option>
                                <option value="news_to_old">New to Old</option>
                                <option value="for_rent">For Rent</option>
                                <option value="for_sale">For Sale</option>
                                <option value="buy">Buy</option>
                            </select>
                        </form>
                    </div>
                </div>
                @foreach($propertyData as $property)
                    <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                @if($property->image)
                                    <img src="{{url('uploads/property/'.$property->image)}}" alt=""
                                         style="height: 300px;" class="img-a img-fluid">
                                @else
                                    <img src="{{url('uploads/errors/not-found.jpg')}}" alt=""
                                         style="height: 300px;" class="img-a img-fluid">

                                @endif
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="{{route('property').'/'.$property->slug}}">{{$property->title}}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">{{$property->types}} | $ {{$property->title}}</span>
                                        </div>
                                        <a href="{{route('property').'/'.$property->slug}}" class="link-a">Click here to
                                            view
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Area</h4>
                                                <span>{{$property->area}}m <sup>2</sup>
                      </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Beds</h4>
                                                <span>{{$property->bedrooms}}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Baths</h4>
                                                <span>{{$property->bathrooms}}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Garages</h4>
                                                <span>{{$property->garages}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--/ Property Grid End /-->

@endsection
