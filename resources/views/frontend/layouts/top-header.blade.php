@section('top-header')

    <div class="click-closed"></div>
    <!--/ Form Search Star /-->
    <div class="box-collapse">
        <div class="title-box-d">
            <h3 class="title-d">Search Property</h3>
        </div>
        <span class="close-box-collapse right-boxed ion-ios-close"></span>
        <div class="box-collapse-wrap form">
            <form action="{{route('property-search')}}" class="form-a" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="title">Keyword</label>
                            <input type="text" class="form-control form-control-lg form-control-a"
                                   name="title" id="title" placeholder="Keyword">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="Type">Types</label>
                            <select name="types" class="form-control form-control-lg form-control-a" id="Type">
                                <option value="">All Type</option>
                                <option value="rent">For Rent</option>
                                <option value="sale">For Sale</option>
                                <option value="buy">For Buy</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="state_name">State name</label>
                            <select name="state_name" id="state_name"
                                    class="form-control form-control-lg form-control-a">
                                <option value="null">All City</option>
                                <option value="alabama">Alabama</option>
                                <option value="arizona">Arizona</option>
                                <option value="california">California</option>
                                <option value="colorado">Colorado</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="bedrooms">Bedrooms</label>
                            <select name="bedrooms" class="form-control form-control-lg form-control-a" id="bedrooms">
                                <option value="null">Any</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="garages">Garages</label>
                            <select name="garages" class="form-control form-control-lg form-control-a" id="garages">
                                <option value="null">Any</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="bathrooms">Bathrooms</label>
                            <select name="bathrooms" class="form-control form-control-lg form-control-a" id="bathrooms">
                                <option value="null">Any</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="price">Min Price</label>
                            <select name="price" class="form-control form-control-lg form-control-a" id="price">
                                <option value="null">Unlimite</option>
                                <option value="50000">$50,000</option>
                                <option value="10000">$100,000</option>
                                <option value="150000">$150,000</option>
                                <option value="200000">$200,000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-b">Search Property</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/ Form Search End /-->

    <!--/ Nav Star /-->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                    aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand"
               href="{{route('index')}}"> @if($settingData){{$settingData->company_name}} @endif</a>
            <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none"
                    data-toggle="collapse"
                    data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('property')}}">Property</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blogs')}}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            My Access
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('seller-login')}}">Seller</a>
                            <a class="dropdown-item" href="{{route('login')}}">Buyer</a>
                        </div>
                    </li>
                    @if(Auth::guard('web')->user())
                        <li class="nav-item">
                            <a href="{{route('buyer')}}" class="nav-link">Dashboard</a>
                        </li>
                    @endif
                </ul>
            </div>
            <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block"
                    data-toggle="collapse"
                    data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
        </div>
    </nav>
    <!--/ Nav End /-->
@endsection

