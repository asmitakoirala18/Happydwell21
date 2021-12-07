<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends BackendController
{

    public function index()
    {
        $this->data('blogData', Blog::orderBy('id', 'desc')->get());
        return view($this->pagePath . 'blog.index', $this->data);
    }


    public function create()
    {
        return view($this->pagePath . 'blog.create', $this->data);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required'
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->slug);
        $blog->date = $request->date;
        $blog->status = $request->status;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->summary = $request->summary;
        $blog->description = $request->description;
        $blog->posted_by = Auth::guard('admin')->user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/blog/');
            if (!$file->move($uploadPath, $imagName)) {
                return redirect()->back()->with('error', 'file upload errors');
            }
            $blog->image = $imagName;
        }


        if ($blog->save()) {
            return redirect()->route('admin-blog.index')->with('success', 'news was inserted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }


    public function show($id)
    {

        $this->data('blogDetails', Blog::findOrFail($id));
        return view($this->pagePath . 'blog.blog-details', $this->data);
    }


    public function edit($id)
    {
        $newData = Blog::findOrFail($id);
        $this->data('blogData', $newData);
        return view($this->pagePath . 'blog.edit-blog', $this->data);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|', [
                Rule::unique('blogs', 'title')->ignore($id)
            ],
            'slug' => 'required|', [
                Rule::unique('blogs', 'slug')->ignore($id)
            ]

        ]);

        $blog = Blog::findOrFail($id);

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->date = $request->date;
        $blog->status = $request->status;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->summary = $request->summary;
        $blog->description = $request->description;
        $blog->posted_by = Auth::guard('admin')->user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/blog/');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imagName)) {
                $blog->image = $imagName;
            }

        }
        if ($blog->update()) {
            return redirect()->route('admin-blog.index')->with('success', 'news was updated');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }

    public function deleteFile($id)
    {
        $pG = Blog::findOrFail($id);
        $imageName = $pG->image;
        $filePath = public_path('uploads/blog/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
            return true;
        }
        return true;
    }


    public function destroy($id)
    {
        $obj = Blog::findOrFail($id);

        if ($this->deleteFile($id) && $obj->delete()) {
            return redirect()->back()->with('success', 'blog was deleted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }
    }
}
