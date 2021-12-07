@extends('backend.master.master')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-eye"></i> User Details</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table">
                                        <tr>
                                            <th>Name</th>
                                            <td>{{$profileData->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>{{$profileData->username}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$profileData->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td>{{$profileData->gender}}</td>
                                        </tr>
                                        <tr>
                                            <th>User Type</th>
                                            <td>{{$profileData->user_type}}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{$profileData->status}}</td>
                                        </tr>
                                        <tr>
                                            <th>Create At</th>
                                            <td>{{$profileData->created_at->diffForHumans()}}</td>
                                        </tr>
                                    </table>

                                </div>
                                <div class="col-md-4">
                                    <img src="{{url('uploads/super-admin/'.$profileData->image)}}"
                                         class="img-fluid img-thumbnail" alt="Profile Picture">

                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <a href="{{route('super-admin')}}" class="btn btn-primary">
                                        <i class="fa fa-hand-o-left"></i> Goto main home page</a>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->




@endsection
