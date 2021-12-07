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
                            <h2><i class="fa fa-eye"></i>
                                 About Details
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
                                <div class="col-md-8">
                                    <h2><a href="">Title: {{$aboutDetails->title}}</a></h2>
                                    <h2><a href="">Slug: {{$aboutDetails->slug}}</a></h2>
                                    <p>Meta Description:
                                        {!! $aboutDetails->meta_description !!}
                                    </p>
                                    <p> Description:
                                        {!! $aboutDetails->description !!}
                                    </p>

                                </div>
                                <div class="col-md-4">
                                    @if($aboutDetails->image)
                                        <img src="{{url('uploads/about-us/'.$aboutDetails->image)}}"
                                             class="img-fluid" alt="">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <a href="{{route('admin-about.index')}}"
                                       class="btn btn-success">
                                        <i class="fa fa-hand-o-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
