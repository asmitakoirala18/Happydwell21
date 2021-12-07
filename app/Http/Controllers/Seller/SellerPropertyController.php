<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyGallery;
use App\Models\SellerProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SellerPropertyController extends Controller
{


    public function index()
    {

        $sellerId = Auth::guard('seller')->user()->id;

        $products = Property::select('properties.*', 'seller_properties.property_id', 'seller_properties.seller_id', 'sellers.id')
            ->join('seller_properties', 'properties.id', '=', 'seller_properties.property_id')
            ->join('sellers', 'seller_properties.seller_id', '=', 'sellers.id')
            ->where('seller_properties.seller_id', '=', $sellerId)
            ->get();
        $this->data('propertyData', $products);
        return view('seller.show', $this->data);
    }


    public function create()
    {

        return view('seller.create', $this->data);

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
            'tax_payment_document' => 'required',
            'state_id_card' => 'required',
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
        $pMod->is_verify = false;


        if ($request->hasFile('tax_payment_document')) {
            $file = $request->file('tax_payment_document');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/property/');
            if (!$file->move($uploadPath, $imagName)) {
                return redirect()->back()->with('error', 'file upload errors');
            }
            $pMod->tax_payment_document = $imagName;
        }

        if ($request->hasFile('state_id_card')) {
            $file = $request->file('state_id_card');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/property/');
            if (!$file->move($uploadPath, $imagName)) {
                return redirect()->back()->with('error', 'file upload errors');
            }
            $pMod->state_id_card = $imagName;
        }


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
            $sellerId = Auth::guard('seller')->user()->id;

            SellerProperty::create([
                'property_id' => $lastId,
                'seller_id' => $sellerId,
            ]);

            if ($request->hasFile('featured_images')) {
                $files = $request->file('featured_images');
                $featuredUploadPath = public_path('uploads/property/featured-images');
                foreach ($files as $file) {
                    $productGallery = new PropertyGallery();
                    $ext = $file->getClientOriginalExtension();
                    $img = md5(microtime()) . '.' . $ext;
                    if ($file->move($featuredUploadPath, $img)) {
                        $productGallery->image_name = $img;
                        $productGallery->property_id = $lastId;
                        $productGallery->save();
                    }
                }

            }
            return redirect()->route('seller-property.index')->with('success', 'property was inserted');

        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }


    }


    public function show($id)
    {

        $this->data('property', Property::findOrFail($id));
        return view('seller.property-details', $this->data);
    }


    public function edit($id)
    {
        $this->data('property', Property::findOrFail($id));
        return view('seller.update', $this->data);
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
        $pMod->is_verify = false;

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
            return redirect()->route('seller-property.index')->with('success', 'product was inserted');
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
        SellerProperty::where('property_id', '=', $id)->delete();
        if (Property::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'property was deleted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }
}
