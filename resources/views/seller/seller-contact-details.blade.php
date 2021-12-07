@extends('seller.master')

@section('content')
    <div class="col-md-12">
        <h1>Message Details</h1>
        <hr>
        @include('backend.layouts.messages')
    </div>
    <div class="col-md-12">
        <h1>{{$contactData->name}}</h1>
        <h2>{{$contactData->email}}</h2>
        <p>
            {{$contactData->message}}
        </p>


    </div>


@endsection
