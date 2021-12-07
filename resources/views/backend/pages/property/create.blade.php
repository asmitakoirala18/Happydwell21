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
                            <h2>
                                <i class="fa fa-plus"></i> Add Property</h2>
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
                                    <form action="{{route('admin-property.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="types">Types:
                                                        <a style="color: red;">{{$errors->first('types')}}</a>
                                                    </label>
                                                    <select name="types" id="types" class="form-control">
                                                        <option value="rent">Rent</option>
                                                        <option value="sale">Sale</option>
                                                        <option value="buy">Buy</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="build_date">Build date:
                                                        <a style="color: red;">{{$errors->first('build_date')}}</a>
                                                    </label>
                                                    <input type="date" name="build_date" id="build_date"
                                                           value="{{old('build_date')}}"
                                                           placeholder="Example: 2021"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="is_slider">Is Slider:
                                                        <a style="color: red;">{{$errors->first('is_slider')}}</a>
                                                    </label>
                                                    <select name="is_slider" id="is_slider" class="form-control">
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="country">country:
                                                        <a style="color: red;">{{$errors->first('country')}}</a>
                                                    </label>
                                                    <input type="text" name="country" id="country"
                                                           value="{{old('country')}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="state_name">State name:
                                                        <a style="color: red;">{{$errors->first('state_name')}}</a>
                                                    </label>
                                                    <input type="text" name="state_name" id="state_name"
                                                           value="{{old('state_name')}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="city_name">City name :
                                                        <a style="color: red;">{{$errors->first('city_name')}}</a>
                                                    </label>
                                                    <input type="text" name="city_name" id="city_name"
                                                           value="{{old('city_name')}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="zip_code">Zip code :
                                                        <a style="color: red;">{{$errors->first('zip_code')}}</a>
                                                    </label>
                                                    <input type="text" name="zip_code" id="zip_code"
                                                           value="{{old('zip_code')}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title:
                                                <a style="color: red;">{{$errors->first('title')}}</a>
                                            </label>
                                            <input type="text" name="title" id="title"
                                                   value="{{old('title')}}"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug:
                                                <a style="color: red;">{{$errors->first('slug')}}</a>
                                            </label>
                                            <input type="text" name="slug" id="slug"
                                                   value="{{old('slug')}}"
                                                   class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="price">price:
                                                        <a style="color: red;">{{$errors->first('price')}}</a>
                                                    </label>
                                                    <input type="number" name="price" id="price"
                                                           value="{{old('price')}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="bedrooms">Bedrooms:
                                                        <a style="color: red;">{{$errors->first('bedrooms')}}</a>
                                                    </label>
                                                    <input type="number" name="bedrooms" id="bedrooms"
                                                           value="{{old('bedrooms')}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="garages">garages:
                                                        <a style="color: red;">{{$errors->first('garages')}}</a>
                                                    </label>
                                                    <input type="number" name="garages" id="garages"
                                                           value="{{old('garages')}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="bathrooms">bathrooms:
                                                        <a style="color: red;">{{$errors->first('bathrooms')}}</a>
                                                    </label>
                                                    <input type="number" name="bathrooms" id="bathrooms"
                                                           value="{{old('bathrooms')}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="area">Area:
                                                        <a style="color: red;">{{$errors->first('area')}}</a>
                                                    </label>
                                                    <input type="number" name="area" id="area"
                                                           value="{{old('area')}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="image">Property Image</label> <br>
                                                    <input type="file" name="image" class="btn btn-default">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="image_name">Featured Images</label> <br>
                                                    <input type="file" name="featured_images[]" multiple
                                                           class="btn btn-default">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="summary">summary:
                                                <a style="color: red;">{{$errors->first('summary')}}</a>
                                            </label>
                                            <textarea name="summary" id="summary"
                                                      class="form-control">{{old('summary')}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description:
                                                <a style="color: red;">{{$errors->first('description')}}</a>
                                            </label>
                                            <textarea name="description" id="description"
                                                      class="form-control">{{old('description')}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success">
                                                <i class="fa fa-plus"></i> Add Property
                                            </button>
                                        </div>
                                    </form>
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
