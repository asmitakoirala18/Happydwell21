@extends('seller.master')

@section('content')
    <form action="{{route('seller-property.update',$property->id)}}" method="post"
          enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="types">Types:
                        <a style="color: red;">{{$errors->first('types')}}</a>
                    </label>
                    <select name="types" id="types" class="form-control">
                        <option value="rent" {{$property->types=='rent' ?'selected':''}}>
                            Rent
                        </option>
                        <option value="sale" {{$property->types=='sale' ?'selected':''}}>
                            Sale
                        </option>
                        <option value="buy" {{$property->types=='buy' ?'selected':''}}>
                            Buy
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="build_date">Build date:
                        <a style="color: red;">{{$errors->first('build_date')}}</a>
                    </label>
                    <input type="date" name="build_date" id="build_date"
                           value="{{$property->build_date}}"
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
                        <option value="0" {{$property->is_slider=='0'?'selected':''}}>
                            No
                        </option>
                        <option value="1" {{$property->is_slider=='1'?'selected':''}}>Yes</option>
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
                           value="{{$property->country}}" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="state_name">State name:
                        <a style="color: red;">{{$errors->first('state_name')}}</a>
                    </label>
                    <input type="text" name="state_name" id="state_name"
                           value="{{$property->state_name}}" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="city_name">City name :
                        <a style="color: red;">{{$errors->first('city_name')}}</a>
                    </label>
                    <input type="text" name="city_name" id="city_name"
                           value="{{$property->city_name}}" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="zip_code">Zip code :
                        <a style="color: red;">{{$errors->first('zip_code')}}</a>
                    </label>
                    <input type="text" name="zip_code" id="zip_code"
                           value="{{$property->zip_code}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="title">Title:
                <a style="color: red;">{{$errors->first('title')}}</a>
            </label>
            <input type="text" name="title" id="title"
                   value="{{$property->title}}"
                   class="form-control">
        </div>
        <div class="form-group">
            <label for="slug">Slug:
                <a style="color: red;">{{$errors->first('slug')}}</a>
            </label>
            <input type="text" name="slug" id="slug"
                   value="{{$property->slug}}"
                   class="form-control">
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="price">price:
                        <a style="color: red;">{{$errors->first('price')}}</a>
                    </label>
                    <input type="number" name="price" id="price"
                           value="{{$property->price}}"
                           class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="bedrooms">Bedrooms:
                        <a style="color: red;">{{$errors->first('bedrooms')}}</a>
                    </label>
                    <input type="number" name="bedrooms" id="bedrooms"
                           value="{{$property->bedrooms}}"
                           class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="garages">garages:
                        <a style="color: red;">{{$errors->first('garages')}}</a>
                    </label>
                    <input type="number" name="garages" id="garages"
                           value="{{$property->garages}}"
                           class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="bathrooms">bathrooms:
                        <a style="color: red;">{{$errors->first('bathrooms')}}</a>
                    </label>
                    <input type="number" name="bathrooms" id="bathrooms"
                           value="{{$property->bathrooms}}"
                           class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="area">Area:
                        <a style="color: red;">{{$errors->first('area')}}</a>
                    </label>
                    <input type="number" name="area" id="area"
                           value="{{$property->area}}"
                           class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Product Image</label> <br>
                    <input type="file" name="image" class="btn btn-default">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="summary">summary:
                <a style="color: red;">{{$errors->first('summary')}}</a>
            </label>
            <textarea name="summary" id="summary"
                      class="form-control">{{$property->summary}}</textarea>
        </div>
        <div class="form-group">
            <label for="description">Description:
                <a style="color: red;">{{$errors->first('description')}}</a>
            </label>
            <textarea name="description" id="description"
                      class="form-control">{{$property->description}}</textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success">
                <i class="fa fa-edit"></i> Update Property
            </button>
        </div>
    </form>
@endsection
