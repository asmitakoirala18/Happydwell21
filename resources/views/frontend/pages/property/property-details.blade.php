@extends('frontend.master.master')

@section('content')
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('backend.layouts.messages')
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{$property->title}}</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('property')}}">Properties</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{$property->title}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Property Single Star /-->
    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                        <div class="carousel-item-b">
                            @if($property->image)
                                <img src="{{url('uploads/property/'.$property->image)}}" alt="">
                            @else
                                <img src="{{url('uploads/errors/not-found.jpg')}}" alt="">

                            @endif
                        </div>
                        @foreach($property->featuredImages as $images)
                            <div class="carousel-item-b">
                                <img src="{{url('uploads/property/featured-images/'.$images->image_name)}}" alt="">
                            </div>
                        @endforeach

                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <span class="ion-money">$</span>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <h5 class="title-c">{{$property->price}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d section-t4">
                                            <h3 class="title-d">Quick Summary</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>Property ID:</strong>
                                            <span>{{$property->id}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Location:</strong>
                                            <span>{{$property->country}}, {{$property->state_name}},{{$property->city_name}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Zip Code:</strong>
                                            <span>{{$property->zip_code}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Property Type:</strong>
                                            <span>{{$property->types}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Area:</strong>
                                            <span>{{$property->area}}m <sup>2</sup>
                      </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Beds:</strong>
                                            <span>{{$property->bedrooms}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>bathrooms:</strong>
                                            <span>{{$property->bathrooms}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Garage:</strong>
                                            <span>{{$property->garages}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 section-md-t3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Property Description</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="property-description">
                                <p class="description color-text-a">
                                    {!! $property->description !!}
                                </p>
                                <hr>

                                <a href="" class="btn btn-success">Total Views: {{$property->page_visit}}</a>

                                <form action="{{route('property-raging')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="card">
                                        <div class="container-fliud">
                                            <div class="wrapper row">
                                                <div class="details col-md-6">
                                                    <h3 class="product-title">Ratting</h3>
                                                    <div class="rating">
                                                        <input id="input-1" name="rate" class="rating rating-loading"
                                                               data-min="0" data-max="5" data-step="1"
                                                               value="{{ $property->sumRating }}"
                                                               data-size="xs">
                                                        <input type="hidden" name="id" required=""
                                                               value="{{ $property->id }}">
                                                        <br/>
                                                        <button class="btn btn-success">Submit Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h1>Facebook </h1>

                    <div id="fb-root"></div>
                    <div class="fb-share-button" data-href="http://127.0.0.1:8000/property/demo-house"
                         data-layout="button_count" data-size="small">
                        <a target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u={{$property->slug}}&amp;src=sdkpreparse"
                           class="fb-xfbml-parse-ignore">Share</a></div>

                </div>
                <div class="col-md-12">
                    <div class="row section-t3">
                        <div class="col-sm-12">
                            <div class="title-box-d">
                                <h3 class="title-d">Contact Seller</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            @if($sellerData)
                                <img src="{{url('uploads/seller/'.$sellerData->image)}}" alt="" class="img-fluid">
                            @endif
                        </div>

                        @if($sellerData)
                            <div class="col-md-6 col-lg-4">
                                <div class="property-agent">
                                    <h4 class="title-agent">Name: {{$sellerData->name}}</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between">
                                            <strong>Phone: </strong>
                                            <span class="color-text-a">{{$sellerData->phone}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Mobile: </strong>
                                            <span class="color-text-a">{{$sellerData->mobile}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Email:</strong>
                                            <span class="color-text-a">{{$sellerData->email}}</span>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <div class="col-md-12 col-lg-4">
                                <div class="property-contact">
                                    <form method="post" action="{{route('contact-seller')}}" class="form-a">
                                        @csrf
                                        <input type="hidden" name="seller_criteria" value="{{$sellerData->email}}">
                                        <div class="row">
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    @if(session('buyers_login_data'))
                                                        <input type="text"
                                                               class="form-control form-control-lg form-control-a"
                                                               name="name" id="inputName"
                                                               value="{{session('buyers_login_data')->name ?? ''}}"
                                                               @if(session('buyers_login_data')->name)
                                                               readonly

                                                               @endif

                                                               placeholder="Name *" required>
                                                    @else
                                                        <input type="text"
                                                               class="form-control form-control-lg form-control-a"
                                                               name="name" id="inputName"
                                                               value=""
                                                               placeholder="Name *" required>
                                                    @endif


                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    @if(session('buyers_login_data'))
                                                        <input type="email"
                                                               class="form-control form-control-lg form-control-a"
                                                               name="email" id="inputEmail1"
                                                               value="{{session('buyers_login_data')->email ?? ''}}"
                                                               @if(session('buyers_login_data')->name)
                                                               readonly

                                                               @endif
                                                               placeholder="Email *" required>
                                                    @else
                                                        <input type="email"
                                                               class="form-control form-control-lg form-control-a"
                                                               name="email" id="inputEmail1"
                                                               value=""
                                                               placeholder="Email *" required>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                        <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45"
                                  rows="8" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-a">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @else
                            <div class="col-md-6 col-lg-4">
                                <div class="property-agent">
                                    <h4 class="title-agent">Name: {{$settingData->company_name}} </h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between">
                                            <strong>Phone: </strong>
                                            <span class="color-text-a">{{$settingData->company_phone}}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Mobile: </strong>
                                            <span class="color-text-a">
                                                {{$settingData->company_mobile}}
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Email:</strong>
                                            <span class="color-text-a">
                                                {{$settingData->company_email}}
                                            </span>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <div class="col-md-12 col-lg-4">
                                <div class="property-contact">
                                    <form method="post" action="{{route('contact-admin-property')}}" class="form-a">
                                        @csrf
                                        <input type="hidden" name="seller_criteria"
                                               value="{{$settingData->company_email}}">
                                        <div class="row">
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-a"
                                                           name="name" id="inputName"
                                                           placeholder="Name *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                                                    <input type="email"
                                                           class="form-control form-control-lg form-control-a"
                                                           name="email" id="inputEmail1"
                                                           placeholder="Email *" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-1">
                                                <div class="form-group">
                        <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45"
                                  rows="8" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-a">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        @endif


                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="fb-comments" data-href="http://127.0.0.1:8000/property/{{$property->slug}}"
                         data-width="" data-numposts="5"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Related Products</h1>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @foreach($relatedProperty as $rProperty)
                            <div class="col-md-4">
                                <div class="card-box-a card-shadow">
                                    <div class="img-box-a">
                                        @if($rProperty->image)
                                            <img src="{{url('uploads/property/'.$rProperty->image)}}" alt=""
                                                 style="height: 300px;" class="img-a img-fluid">
                                        @else
                                            <img src="{{url('uploads/errors/not-found.jpg')}}" style="height: 300px;"
                                                 class="img-a img-fluid" alt="">

                                        @endif
                                    </div>
                                    <div class="card-overlay">
                                        <div class="card-overlay-a-content">
                                            <div class="card-header-a">
                                                <h2 class="card-title-a">
                                                    <a href="{{route('property').'/'.$rProperty->slug}}">{{$rProperty->title}}</a>
                                                </h2>
                                            </div>
                                            <div class="card-body-a">
                                                <div class="price-box d-flex">
                                                    <span
                                                        class="price-a">{{$rProperty->types}} | $ {{$rProperty->title}}</span>
                                                </div>
                                                <a href="{{route('property').'/'.$rProperty->slug}}" class="link-a">Click
                                                    here to
                                                    view
                                                    <span class="ion-ios-arrow-forward"></span>
                                                </a>
                                            </div>
                                            <div class="card-footer-a">
                                                <ul class="card-info d-flex justify-content-around">
                                                    <li>
                                                        <h4 class="card-info-title">Area</h4>
                                                        <span>{{$rProperty->area}}m <sup>2</sup>
                      </span>
                                                    </li>
                                                    <li>
                                                        <h4 class="card-info-title">Beds</h4>
                                                        <span>{{$rProperty->bedrooms}}</span>
                                                    </li>
                                                    <li>
                                                        <h4 class="card-info-title">Baths</h4>
                                                        <span>{{$rProperty->bathrooms}}</span>
                                                    </li>
                                                    <li>
                                                        <h4 class="card-info-title">Garages</h4>
                                                        <span>{{$rProperty->garages}}</span>
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
            </div>
        </div>
    </section>
    <!--/ Property Single End /-->



@endsection
