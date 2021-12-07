@extends("frontend.master.master")


@section('content')

    <!--/ Carousel Star /-->
    <div class="intro intro-carousel">
        <div id="carousel" class="owl-carousel owl-theme">
            @foreach($sliderData as $slider)
                <div class="carousel-item-a intro-item bg-image"
                     @if($slider->image)
                     style="background-image: url({{url('uploads/property/'.$slider->image)}})"
                     @else
                     style="background-image: url({{url('uploads/errors/not-found.jpg')}})"
                    @endif>
                    <div class="overlay overlay-a"></div>
                    <div class="intro-content display-table">
                        <div class="table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="intro-body">
                                            <h1 class="intro-title mb-4">
                                                {{$slider->title}}</h1>
                                            <p class="intro-subtitle intro-price">
                                                <a href="{{route('property').'/'.$slider->slug}}"><span
                                                        class="price-a">{{$slider->types}} | $ {{$slider->price}}</span></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!--/ Carousel end /-->

    <!--/ Services Star /-->
    <section class="section-services section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Our Services</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($serviceType as $sType)
                    <div class="col-md-4">
                        <div class="card-box-c foo">
                            <div class="card-header-c d-flex">
                                <div class="card-title-c align-self-center">
                                    <h2 class="title-c">
                                        <a href="{{route('service-type',$sType->slug)}}">{{$sType->type}}</a></h2>
                                </div>
                            </div>
                            <div class="card-body-c">
                                <p class="content-c">
                                    {!! $sType->description !!}
                                </p>
                            </div>
                            <div class="card-footer-c">
                                <a href="{{route('service-type',$sType->slug)}}" class="link-c link-icon">Read more
                                    <span class="ion-ios-arrow-forward"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--/ Services End /-->

    <!--/ Property Star /-->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Latest Properties</h2>
                        </div>
                        <div class="title-link">
                            <a href="{{route('property')}}">All Property
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">

                @foreach($propertyData as $property)
                    <div class="carousel-item-b">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                @if($property->image)
                                    <img src="{{url('uploads/property/'.$property->image)}}" alt=""
                                         class="img-a img-fluid"
                                         style="height: 400px;">
                                @else
                                    <img
                                        src="{{url('uploads/errors/not-found.jpg')}}" alt=""
                                        class="img-a img-fluid"
                                        style="height: 400px;">

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
                                            <span class="price-a">{{$property->types}} | $ {{$property->price}}</span>
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
                                                <span>{{$property->area}}m
                        <sup>2</sup>
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
    <!--/ Property End /-->



    <!--/ News Star /-->
    <section class="section-news section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Latest Blogs</h2>
                        </div>
                        <div class="title-link">
                            <a href="">All Blogs
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="new-carousel" class="owl-carousel owl-theme">
                @foreach($blogData as $blog)
                    <div class="carousel-item-c">
                        <div class="card-box-b card-shadow news-box">
                            <div class="img-box-b">
                                <img src="{{url('uploads/blog/'.$blog->image)}}" alt="" class="img-b img-fluid"
                                     style="height: 400px;">
                            </div>
                            <div class="card-overlay">
                                <div class="card-header-b">
                                    <div class="card-title-b">
                                        <h2 class="title-2">
                                            <a href="{{route('blogs').'/'.$blog->slug}}">{{$blog->title}}</a>
                                        </h2>
                                    </div>
                                    <div class="card-date">
                                        <span class="date-b">{{$blog->date}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--/ News End /-->




@endsection
