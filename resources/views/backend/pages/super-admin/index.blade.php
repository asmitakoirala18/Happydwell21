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
                            <h2><i class="fa fa-eye"></i> Show Users List</h2>
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
                                            <th>Privilege</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($adminData as $key=>$admin)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->username}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->gender}}</td>
                                                <td>{{$admin->user_type}}</td>
                                                <td>
                                                    <form action="{{route('update-super-admin-status')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="admin_id" value="{{$admin->id}}">
                                                        @if($admin->status==1)
                                                            <button name="active" class="btn-xs btn-success">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        @else
                                                            <button name="inactive" class="btn-xs btn-danger">
                                                                <i class="fa fa-clock-o"></i>
                                                            </button>
                                                        @endif
                                                    </form>


                                                </td>
                                                <td>
                                                    <img src="{{url('uploads/super-admin/'.$admin->image)}}" width="40"
                                                         alt="">
                                                </td>
                                                <td>
                                                    <a href="{{route('super-admin-profile').'/'.$admin->id}}"
                                                       class="btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('edit-super-admin').'/'.$admin->id}}" class="btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('super-admin-delete').'/'.$admin->id}}"
                                                       onclick="return confirm('Are you sure?')"
                                                       class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
