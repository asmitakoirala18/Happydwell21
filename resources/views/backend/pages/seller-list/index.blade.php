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
                            <h2><i class="fa fa-eye"></i> Seller List</h2>
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
                                <div class="col-md-12">
                                    @include('backend.layouts.messages')
                                </div>
                                <div class="col-md-12">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>S.n</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sellerData as $key=>$seller)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    {{$seller->name}}
                                                    <hr>
                                                    <form action="{{route('admin-seller-verify')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="criteria" value="{{$seller->id}}">
                                                    @if($seller->seller_verify==1)
                                                        <button name="seller_verify" class="btn-sm btn-success">Verified</button>

                                                    @else
                                                        <button name="seller_not_verify" class="btn-sm btn-warning">Not Verify</button>

                                                    @endif
                                                    </form>

                                                </td>
                                                <td>{{$seller->username}}</td>
                                                <td>{{$seller->email}}</td>
                                                <td>{{$seller->gender}}</td>

                                                <td>
                                                    <img src="{{url('uploads/seller/'.$seller->image)}}" width="40"
                                                         alt="">
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
