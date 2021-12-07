<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AboutController extends BackendController
{
    public function index()
    {
        $this->data('aboutData', About::orderBy('id', 'desc')->get());
        return view($this->pagePath . 'about-us.index', $this->data);
    }


    public function create()
    {
        return view($this->pagePath . 'about-us.create', $this->data);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|unique:abouts,title',
            'slug' => 'required|unique:abouts,slug'
        ]);

        $aboutObject = new About();
        $aboutObject->title = $request->title;
        $aboutObject->slug = Str::slug($request->slug);
        $aboutObject->date = $request->date;
        $aboutObject->status = $request->status;
        $aboutObject->meta_keywords = $request->meta_keywords;
        $aboutObject->meta_description = $request->meta_description;
        $aboutObject->summary = $request->summary;
        $aboutObject->description = $request->description;
        $aboutObject->posted_by = Auth::guard('admin')->user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/about-us/');
            if (!$file->move($uploadPath, $imagName)) {
                return redirect()->back()->with('error', 'file upload errors');
            }
            $aboutObject->image = $imagName;
        }


        if ($aboutObject->save()) {
            return redirect()->route('admin-about.index')->with('success', 'about was inserted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }


    public function show($id)
    {

        $this->data('aboutDetails', About::findOrFail($id));
        return view($this->pagePath . 'about-us.about-details', $this->data);
    }


    public function edit($id)
    {
        $aboutData = About::findOrFail($id);
        $this->data('aboutData', $aboutData);
        return view($this->pagePath . 'about-us.edit-about', $this->data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|', [
                Rule::unique('abouts', 'title')->ignore($id)
            ],
            'slug' => 'required|', [
                Rule::unique('abouts', 'slug')->ignore($id)
            ]

        ]);

        $aboutUs = About::findOrFail($id);

        $aboutUs->title = $request->title;
        $aboutUs->slug = Str::slug($request->title);
        $aboutUs->date = $request->date;
        $aboutUs->status = $request->status;
        $aboutUs->meta_keywords = $request->meta_keywords;
        $aboutUs->meta_description = $request->meta_description;
        $aboutUs->summary = $request->summary;
        $aboutUs->description = $request->description;
        $aboutUs->posted_by = Auth::guard('admin')->user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/about-us/');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imagName)) {
                $aboutUs->image = $imagName;
            }

        }
        if ($aboutUs->update()) {
            return redirect()->route('admin-about.index')->with('success', 'about us was updated');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }

    public function deleteFile($id)
    {
        $pG = About::findOrFail($id);
        $imageName = $pG->image;
        $filePath = public_path('uploads/about-us/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
            return true;
        }
        return true;
    }


    public function destroy($id)
    {
        $obj = About::findOrFail($id);

        if ($this->deleteFile($id) && $obj->delete()) {
            return redirect()->back()->with('success', 'about was deleted');
        } else {
            return redirect()->back()->with('error', 'about was a problems');
        }
    }
}
