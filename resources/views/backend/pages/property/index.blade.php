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
                            <h2><i class="fa fa-eye"></i> Property List</h2>
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
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Build Date</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>zip Code</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($propertyData as $key=>$property)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    {{$property->title}}
                                                    <hr>

                                                    <form action="{{route('admin-property-verify')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="criteria" value="{{$property->id}}">
                                                        @if($property->is_verify==1)
                                                            <button name="verified" class="btn-sm btn-success">Verified</button>
                                                        @else
                                                            <button name="not_verify" class="btn-ms btn-warning">Not Verify</button>
                                                        @endif

                                                    </form>
                                                </td>
                                                <td>{{$property->price}}</td>
                                                <td>{{$property->build_date}}</td>
                                                <td>{{$property->country}}</td>
                                                <td>{{$property->state_name}}</td>
                                                <td>{{$property->zip_code}}</td>
                                                <td>
                                                    <img src="{{url('uploads/property/'.$property->image)}}" width="30"
                                                         alt="">
                                                </td>
                                                <td>
                                                    <form action="{{route('admin-property.destroy',$property->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{route('admin-property.show',$property->id)}}"
                                                           class="btn-sm btn-primary">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{route('admin-property.edit',$property->id)}}"
                                                           class="btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button class="btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
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
