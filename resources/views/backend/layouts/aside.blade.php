@section('aside')
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="" class="site_title"><i class="fa fa-paw"></i> <span>Company Name</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="{{url('uploads/super-admin/'.Auth::guard('admin')->user()->image)}}" alt="..."
                         class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>{{Auth::guard('admin')->user()->username}}</h2>
                </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="{{route('company-backend')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                        <li><a><i class="fa fa-users"></i> Super Admin <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('create-super-admin')}}">Create</a></li>
                                <li><a href="{{route('super-admin')}}">Show</a></li>


                            </ul>
                        </li>
                        <li><a><i class="fa fa-folder"></i> Property <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-property.create')}}">Add Property</a></li>
                                <li><a href="{{route('admin-property.index')}}">Show Property</a></li>


                            </ul>
                        </li>
                        <li><a href="{{route('admin-seller-list')}}"> <i class="fa fa-users"></i> Seller list</a></li>
                        <li><a href="{{route('buyer-list')}}"> <i class="fa fa-users"></i> Buyer list</a></li>
                        <li><a href="{{route('admin-contact')}}"> <i class="fa fa-envelope"></i> Contact List</a></li>

                        <li><a><i class="fa fa-newspaper-o"></i> Service Type <span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-service-type.create')}}">Add </a></li>
                                <li><a href="{{route('admin-service-type.index')}}">Show </a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-newspaper-o"></i> Service <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-service.create')}}">Add Service</a></li>
                                <li><a href="{{route('admin-service.index')}}">Show Service</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-newspaper-o"></i> Blogs <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-blog.create')}}">Add Blog</a></li>
                                <li><a href="{{route('admin-blog.index')}}">Show Blogs</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-folder"></i> About Us <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin-about.create')}}">Add AboutUs</a></li>
                                <li><a href="{{route('admin-about.index')}}">Show AboutUs</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            <!-- /menu footer buttons -->
        </div>
    </div>

@endsection
