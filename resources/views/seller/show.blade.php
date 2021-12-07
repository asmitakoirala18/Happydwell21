@extends('seller.master')

@section('content')
    <div class="col-md-12">
        <h1>Property List</h1>
        <hr>
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
                <th>Status</th>
                <th>zip Code</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($propertyData as $key=>$property)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$property->title}}</td>
                    <td>{{$property->price}}</td>
                    <td>{{$property->build_date}}</td>
                    <td>{{$property->country}}</td>
                    <td>{{$property->state_name}}</td>
                    <td>
                        @if($property->is_verify==1)
                            <button class="btn-sm btn-success">Verified</button>

                        @else
                            <button class="btn-sm btn-warning">Pending</button>

                        @endif
                    </td>
                    <td>{{$property->zip_code}}</td>
                    <td>
                        <img src="{{url('uploads/property/'.$property->image)}}" width="30"
                             alt="">
                    </td>
                    <td>
                        <form action="{{route('seller-property.destroy',$property->property_id)}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <a href="{{route('seller-property.show',$property->property_id)}}"
                               class="btn-sm btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('seller-property.edit',$property->property_id)}}"
                               class="btn-sm btn-success">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button class="btn-sm btn-danger">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
