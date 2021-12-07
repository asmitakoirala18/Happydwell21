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
                            <h2><i class="fa fa-eye"></i> Property Details
                                <a href="{{route('admin-property.index')}}" class="btn-sm btn-success">
                                    <i class="fa fa-hand-o-right"></i> Goto Property list</a>

                            </h2>
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
                                    <table class="table">
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
                                        <tr>
                                            <th>State Id Card</th>
                                            <td>
                                                @if($property->state_id_card)
                                                    <img
                                                        src="{{url('uploads/property/'.$property->state_id_card)}}"
                                                        width="100" alt="">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tax Payment Document</th>
                                            <td>
                                                @if($property->tax_payment_document)
                                                    <img
                                                        src="{{url('uploads/property/'.$property->tax_payment_document)}}"
                                                        width="100" alt="">
                                                @endif
                                            </td>
                                        </tr>

                                    </table>
                                    <hr>

                                    <a href="{{route('admin-property.index')}}" class="btn btn-success"> Goto Property
                                        List</a>
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
