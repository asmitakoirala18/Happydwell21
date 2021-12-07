<?php

namespace App\Http\Controllers\Backend;

use App\Models\Property;
use App\Models\PropertyGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PropertyController extends BackendController
{

    public function index()
    {
        $propertyData = Property::orderBy('id', 'desc')->get();
        $this->data('propertyData', $propertyData);
        return view($this->pagePath . 'property.index', $this->data);
    }


    public function create()
    {
        return view($this->pagePath . 'property.create', $this->data);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'types' => 'required',
            'build_date' => 'required',
            'country' => 'required',
            'state_name' => 'required',
            'city_name' => 'required',
            'zip_code' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:properties,slug',
            'price' => 'required',
            'bedrooms' => 'required',
            'garages' => 'required',
            'bathrooms' => 'required',
            'area' => 'required',
            'summary' => 'required',
        ]);

        $pMod = new Property();
        $pMod->types = $request->types;
        $pMod->build_date = $request->build_date;
        $pMod->country = $request->country;
        $pMod->state_name = $request->state_name;
        $pMod->city_name = $request->city_name;
        $pMod->zip_code = $request->zip_code;
        $pMod->title = $request->title;
        $pMod->slug = Str::slug($request->slug);
        $pMod->price = $request->price;
        $pMod->bedrooms = $request->bedrooms;
        $pMod->garages = $request->garages;
        $pMod->bathrooms = $request->bathrooms;
        $pMod->area = $request->area;
        $pMod->summary = $request->summary;
        $pMod->description = $request->description;
        $pMod->is_slider = $request->is_slider;
        $pMod->is_verify = true;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/property/');
            if (!$file->move($uploadPath, $imagName)) {
                return redirect()->back()->with('error', 'file upload errors');
            }
            $pMod->image = $imagName;
        }

        if ($pMod->save()) {
            $lastId = $pMod->id;
            if ($request->hasFile('featured_images')) {
                $files = $request->file('featured_images');
                $featuredUploadPath = public_path('uploads/property/featured-images');
                foreach ($files as $file) {
                    $propertyGallery = new PropertyGallery();
                    $ext = $file->getClientOriginalExtension();
                    $img = md5(microtime()) . '.' . $ext;
                    if ($file->move($featuredUploadPath, $img)) {
                        $propertyGallery->image_name = $img;
                        $propertyGallery->property_id = $lastId;
                        $propertyGallery->save();
                    }
                }

            }
            return redirect()->route('admin-property.index')->with('success', 'property was created');

        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }


    public function show($id)
    {
        $this->data('property', Property::findOrFail($id));
        return view($this->pagePath . 'property.show', $this->data);
    }


    public function edit($id)
    {
        $this->data('property', Property::findOrFail($id));
        return view($this->pagePath . 'property.update', $this->data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'types' => 'required',
            'build_date' => 'required',
            'country' => 'required',
            'state_name' => 'required',
            'city_name' => 'required',
            'zip_code' => 'required',
            'title' => 'required',
            'slug' => 'required|', [
                Rule::unique('properties', 'slug')->ignore($id)
            ],
            'price' => 'required',
            'bedrooms' => 'required',
            'garages' => 'required',
            'bathrooms' => 'required',
            'area' => 'required',
            'summary' => 'required',
        ]);

        $pMod = Property::findOrFail($id);
        $pMod->types = $request->types;
        $pMod->build_date = $request->build_date;
        $pMod->country = $request->country;
        $pMod->state_name = $request->state_name;
        $pMod->city_name = $request->city_name;
        $pMod->zip_code = $request->zip_code;
        $pMod->title = $request->title;
        $pMod->slug = Str::slug($request->slug);
        $pMod->price = $request->price;
        $pMod->bedrooms = $request->bedrooms;
        $pMod->garages = $request->garages;
        $pMod->bathrooms = $request->bathrooms;
        $pMod->area = $request->area;
        $pMod->summary = $request->summary;
        $pMod->description = $request->description;
        $pMod->is_slider = $request->is_slider;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/property/');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imagName)) {
                $pMod->image = $imagName;
            }

        }

        if ($pMod->save()) {
            return redirect()->route('admin-property.index')->with('success', 'property was inserted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }

    public function deleteFeaturedImages($criteria)
    {
        $pG = PropertyGallery::where('property_id', '=', $criteria)->get();
        foreach ($pG as $value) {
            $path = public_path('uploads/property/featured-images/' . $value->image_name);
            unlink($path);
            PropertyGallery::where('property_id', '=', $criteria)->delete();
        }
        return true;
    }

    public function deleteFile($id)
    {
        $pG = Property::findOrFail($id);
        $imageName = $pG->image;
        $filePath = public_path('uploads/property/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
            return true;
        }
        return true;
    }


    public function destroy($id)
    {
        $this->deleteFeaturedImages($id);
        $this->deleteFile($id);
        if (Property::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'property was deleted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }

    public function propertyVerify(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        $id = $request->criteria;
        $object = Property::findOrFail($id);

        if (isset($_POST['verified'])) {
            $object->is_verify = false;
            $message = 'Property not verify';
        }

        if (isset($_POST['not_verify'])) {
            $object->is_verify = true;
            $message = 'Property was verified';
        }

        if ($object->update()) {
            return redirect()->back()->with('success', $message);
        }
    }
}
