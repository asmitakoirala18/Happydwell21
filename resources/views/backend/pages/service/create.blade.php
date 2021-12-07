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
                            <h2><i class="fa fa-plus"></i> Add Service
                                <a href="{{route('admin-service.index')}}" class="btn-sm btn-success">
                                    <i class="fa fa-hand-o-right"></i> Show Service List</a>
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
                                    <form action="{{route('admin-service.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="service_type_id">Service Type</label>
                                                    <select name="service_type_id" class="form-control"
                                                            id="service_type_id">
                                                        @foreach($serviceType as $type)
                                                            <option value="{{$type->id}}">{{$type->type}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date">Date date:
                                                        <a style="color: red;">{{$errors->first('date')}}</a>
                                                    </label>
                                                    <input type="date" name="date" id="date"
                                                           value="{{old('date')}}"
                                                           placeholder="Example: 2021"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status"> Status:
                                                        <a style="color: red;">{{$errors->first('status')}}</a>
                                                    </label>
                                                    <select name="status" id="status"
                                                            class="form-control">
                                                        <option value="" selected readonly>--- Select Status
                                                            ---
                                                        </option>
                                                        <option
                                                            value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                                            Public
                                                        </option>
                                                        <option
                                                            value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                            Draft
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="image">Image: <a
                                                            style="color: red;">{{$errors->first('image')}}</a></label>
                                                    <input name="image" type="file" id="image" class="btn btn-default">
                                                </div>

                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label for="title">Title <a href=""
                                                                        style="color: red;">*{{$errors->first('title')}}</a></label>
                                            <input type="text" name="title" id="title" value="{{old('title')}}"
                                                   class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug <a href=""
                                                                      style="color: red;">{{$errors->first('slug')}}</a></label>
                                            <input type="text" name="slug" id="slug"
                                                   class="form-control">
                                        </div>


                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label> <br>
                                            <input type="text" name="meta_keywords"
                                                   value="{{old('meta_keywords','home property,rent property')}}"
                                                   data-role="tagsinput" class="form-control" id="meta_keywords">
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label>
                                            <br>
                                            <textarea name="meta_description" id="meta_description"
                                                      style="resize: none;"
                                                      class="form-control"
                                                      rows="4">{{old('meta_description')}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="summary">Summary: *
                                                <a style="color: red;">{{$errors->first('summary')}}</a>
                                            </label>
                                            <br>
                                            <textarea name="summary" id="summary"
                                                      class="form-control"
                                                      rows="4">{{old('summary')}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="description_id">Details</label>
                                            <br>
                                            <textarea name="description" id="description_id"
                                                      class="form-control">{{old('description')}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn-sm btn-success"><i
                                                    class="fa fa-plus"></i> Add Service
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
@endsection




