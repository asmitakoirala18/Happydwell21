<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Buyer Dashboard</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{url('buyer-assets/assets/css/bootstrap.css')}}" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="{{url('buyer-assets/assets/css/font-awesome.css')}}" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="{{url('buyer-assets/assets/css/chat.css')}}" rel="stylesheet"/>
    <link href="{{url('buyer-assets/assets/css/custom.css')}}" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
</head>
<body>


<div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logo.png"/>

                </a>

            </div>

            <span class="logout-spn">
                  <a href="{{route('logout')}}" style="color:#fff;">LOGOUT</a>

                </span>
        </div>
    </div>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="active-link">
                    <a href="{{route('buyer')}}"><i class="fa fa-desktop "></i>Dashboard </a>
                </li>
                <li>
                    <a href="{{route('buyer-live-chat')}}"><i class="fa fa-table "></i> Live Chat</a>
                </li>

            </ul>
        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<div class="footer">


    <div class="row">
        <div class="col-lg-12">
            &copy; {{date('Y-m-d')}}
        </div>
    </div>
</div>


<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="{{url('buyer-assets/assets/js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{url('buyer-assets/assets/js/bootstrap.min.js')}}"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{url('buyer-assets/assets/js/chat.js')}}"></script>
<script src="{{url('buyer-assets/assets/js/custom.js')}}"></script>
<script>
    let Token = '{{csrf_token()}}';
    let URL = '{{url('/')}}';
</script>


</body>
</html>
