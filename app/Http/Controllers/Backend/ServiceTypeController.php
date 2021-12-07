<?php

namespace App\Http\Controllers\Backend;


use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceTypeController extends BackendController
{
    public function index()
    {
        $this->data('serviceTypeData', ServiceType::orderBy('id', 'desc')->get());
        return view($this->pagePath . 'service-type.index', $this->data);
    }


    public function create()
    {
        return view($this->pagePath . 'service-type.create', $this->data);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'type' => 'required|unique:service_types,type',
            'slug' => 'required|unique:service_types,type',
        ]);

        $serviceObj = new ServiceType();
        $serviceObj->type = $request->type;
        $serviceObj->slug = Str::slug($request->slug);
        $serviceObj->description = $request->description;
        if ($serviceObj->save()) {
            return redirect()->route('admin-service-type.index')->with('success', 'service was inserted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }


    public function show($id)
    {

        $this->data('serviceTypeDetails', ServiceType::findOrFail($id));
        return view($this->pagePath . 'service-type.show', $this->data);
    }


    public function edit($id)
    {
        $serviceData = ServiceType::findOrFail($id);
        $this->data('serviceTypeData', $serviceData);
        return view($this->pagePath . 'service-type.edit', $this->data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required|', [
                Rule::unique('service_types', 'type')->ignore($id)
            ],
            'slug' => 'required|', [
                Rule::unique('service_types', 'slug')->ignore($id)
            ],
        ]);

        $serviceObj = ServiceType::findOrFail($id);

        $serviceObj->type = $request->type;
        $serviceObj->slug = Str::slug($request->slug);
        $serviceObj->description = $request->description;

        if ($serviceObj->update()) {
            return redirect()->route('admin-service-type.index')->with('success', 'service was updated');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }


    public function destroy($id)
    {
        $obj = ServiceType::findOrFail($id);

        $totalServiceData = Service::where("service_type_id", '=', $id)->count();
        if ($totalServiceData > 0) {
            return redirect()->back()->with('error', 'this data belong to another table');
        } else {
            if ($obj->delete()) {
                return redirect()->back()->with('success', 'service was deleted');
            } else {
                return redirect()->back()->with('error', 'there was a problems');
            }
        }


    }
}
