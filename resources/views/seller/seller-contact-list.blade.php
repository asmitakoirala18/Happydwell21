@extends('seller.master')

@section('content')
    <div class="col-md-12">
        <h1>Message List</h1>
        <hr>
        @include('backend.layouts.messages')
    </div>
    <div class="col-md-12">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>S.n</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sellerContactDataList as $key=>$contact)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->message}}</td>

                    <td>
                        <a href="{{route('seller-contact-list-details',$contact->id)}}"
                           class="btn-sm btn-primary">
                            <i class="fa fa-eye"></i>
                        </a>
                        <button class="btn-sm btn-danger">
                            <i class="fa fa-trash-o"></i>
                        </button>

                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
