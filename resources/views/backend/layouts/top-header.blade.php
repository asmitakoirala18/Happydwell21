@section('top-header')
    <!-- top navigation -->
    <div class="top_nav">
        <div class="nav_menu">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                           id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{url('uploads/super-admin/'.Auth::guard('admin')->user()->image)}}" alt="">
                            {{Auth::guard('admin')->user()->username}}
                        </a>
                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="javascript:;"> Profile</a>
                            <a class="dropdown-item" href="javascript:;">Change Password</a>
                            <a class="dropdown-item" href="{{route('admin-logout')}}"><i
                                    class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </div>
                    </li>

                    <li role="presentation" class="nav-item dropdown open">
                        <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                           data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-green">
                                {{$sellerPropertyData->count()}}
                            </span>
                        </a>
                        <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                            @foreach($sellerPropertyData as $property)
                                <li class="nav-item">
                                    <a class="dropdown-item">
                                        <span class="image">
                                            <img src="{{url('uploads/seller/'.$property->seller_photo)}}" alt="Profile Image"/></span>
                                        <span>
                            <span>{{$property->name}}</span>
                            <span class="time">{{$property->created_at->diffForHumans()}}</span>
                          </span>
                                        <span class="message">
                            {{$property->title}}
                          </span>
                                    </a>
                                </li>
                            @endforeach

                            <li class="nav-item">
                                <div class="text-center">
                                    <a class="dropdown-item">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- /top navigation -->
@endsection
