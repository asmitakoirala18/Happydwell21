<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends BackendController
{
    public function index()
    {
        $this->data('serviceData', Service::orderBy('id', 'desc')->get());
        return view($this->pagePath . 'service.index', $this->data);
    }


    public function create()
    {
        $this->data('serviceType', ServiceType::all());
        return view($this->pagePath . 'service.create', $this->data);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'service_type_id' => 'required'
        ]);

        $serviceObj = new Service();
        $serviceObj->title = $request->title;
        $serviceObj->slug = Str::slug($request->slug);
        $serviceObj->date = $request->date;
        $serviceObj->status = $request->status;
        $serviceObj->meta_keywords = $request->meta_keywords;
        $serviceObj->meta_description = $request->meta_description;
        $serviceObj->summary = $request->summary;
        $serviceObj->description = $request->description;
        $serviceObj->posted_by = Auth::guard('admin')->user()->id;
        $serviceObj->service_type_id = $request->service_type_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/service/');
            if (!$file->move($uploadPath, $imagName)) {
                return redirect()->back()->with('error', 'file upload errors');
            }
            $serviceObj->image = $imagName;
        }


        if ($serviceObj->save()) {
            return redirect()->route('admin-service.index')->with('success', 'service was inserted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }


    public function show($id)
    {

        $this->data('serviceDetails', Service::findOrFail($id));
        return view($this->pagePath . 'service.show', $this->data);
    }


    public function edit($id)
    {
        $this->data('serviceType', ServiceType::all());
        $serviceData = Service::findOrFail($id);
        $this->data('serviceData', $serviceData);
        return view($this->pagePath . 'service.edit', $this->data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|', [
                Rule::unique('services', 'title')->ignore($id)
            ],
            'slug' => 'required|', [
                Rule::unique('services', 'slug')->ignore($id)
            ]

        ]);

        $serviceObj = Service::findOrFail($id);

        $serviceObj->title = $request->title;
        $serviceObj->slug = Str::slug($request->title);
        $serviceObj->date = $request->date;
        $serviceObj->status = $request->status;
        $serviceObj->meta_keywords = $request->meta_keywords;
        $serviceObj->meta_description = $request->meta_description;
        $serviceObj->summary = $request->summary;
        $serviceObj->description = $request->description;
        $serviceObj->posted_by = Auth::guard('admin')->user()->id;
        $serviceObj->service_type_id = $request->service_type_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/service/');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imagName)) {
                $serviceObj->image = $imagName;
            }

        }
        if ($serviceObj->update()) {
            return redirect()->route('admin-service.index')->with('success', 'service was updated');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }

    public function deleteFile($id)
    {
        $pG = Service::findOrFail($id);
        $imageName = $pG->image;
        $filePath = public_path('uploads/service/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
            return true;
        }
        return true;
    }


    public function destroy($id)
    {
        $obj = Service::findOrFail($id);

        if ($this->deleteFile($id) && $obj->delete()) {
            return redirect()->back()->with('success', 'service was deleted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }
}
