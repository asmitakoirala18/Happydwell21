@extends('seller.master')

@section('content')
    <div class="col-md-12">
        <h1>Property List</h1>
        <hr>

    </div>
    <div class="col-md-12">
        <table class="table table-hover">
            <tr>
                <th>Types</th>
                <td>{{$property->types}}</td>
            </tr>
            <tr>
                <th>country</th>
                <td>{{$property->country}}</td>
            </tr>
            <tr>
                <th>state name</th>
                <td>{{$property->state_name}}</td>
            </tr>
            <tr>
                <th>city name</th>
                <td>{{$property->city_name}}</td>
            </tr>
            <tr>
                <th>zip code</th>
                <td>{{$property->zip_code}}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{$property->title}}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>{{$property->slug}}</td>
            </tr>
            <tr>
                <th>price</th>
                <td>{{$property->price}}</td>
            </tr>
            <tr>
                <th>build date</th>
                <td>{{$property->build_date}}</td>
            </tr>
            <tr>
                <th>bedrooms</th>
                <td>{{$property->bedrooms}}</td>
            </tr>
            <tr>
                <th>garages</th>
                <td>{{$property->garages}}</td>
            </tr>
            <tr>
                <th>bathrooms</th>
                <td>{{$property->bathrooms}}</td>
            </tr>
            <tr>
                <th>area</th>
                <td>{{$property->area}}</td>
            </tr>
            <tr>
                <th>summary</th>
                <td>{!!  $property->summary !!}</td>
            </tr>
            <tr>
                <th>description</th>
                <td>{!!  $property->description !!}</td>
            </tr>
            <tr>
                <th>image</th>
                <td>
                    <img src="{{url('uploads/property/'.$property->image)}}" width="40"
                         alt="">
                </td>
            </tr>
            <tr>
                <th>featured images</th>
                <td>
                    @foreach($property->featuredImages as $images)
                        <img
                            src="{{url('uploads/property/featured-images/'.$images->image_name)}}"
                            width="30" alt="">
                    @endforeach
                </td>

            </tr>

        </table>
        <hr>

        <a href="{{route('seller-property.index')}}" class="btn btn-success"> Goto Property list</a>
    </div>

@endsection
