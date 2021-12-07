<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class SuperAdminController extends BackendController
{
    public function deleteFile($id)
    {
        $findData = SuperAdmin::findOrFail($id);
        $image = $findData->image;
        $filePath = public_path('uploads/super-admin/' . $image);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
            return true;
        }
        return true;
    }

    public function index()
    {
        $adminData = SuperAdmin::orderBy('id', 'desc')->get();
        $this->data('adminData', $adminData);
        return view($this->pagePath . 'super-admin.index', $this->data);
    }

    public function insert()
    {
        return view($this->pagePath . 'super-admin.create',$this->data);
    }

    public function insertRecord(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|min:3|max:20|unique:super_admins,username',
            'email' => 'required|email|unique:super_admins,email',
            'password' => 'required|min:5|max:20|confirmed',
            'password_confirmation' => 'required',
            'gender' => 'required',
            'user_type' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $aObj = new SuperAdmin();
        $aObj->name = $request->name;
        $aObj->username = $request->username;
        $aObj->email = $request->email;
        $aObj->password = bcrypt($request->password);
        $aObj->gender = $request->gender;
        $aObj->user_type = $request->user_type;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/super-admin/');
            if (!$file->move($uploadPath, $imagName)) {
                return redirect()->back()->with('error', 'file upload errors');
            }
            $aObj->image = $imagName;
        }

        if ($aObj->save()) {
            return redirect()->route('super-admin')->with('success', 'Data was inserted');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }

    }

    public function delete(Request $request)
    {
        $id = $request->criteria;
        if ($this->deleteFile($id) && SuperAdmin::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'data was deleted');
        } else {
            return redirect()->back()->with('error', 'there was problems');
        }

    }

    public function show(Request $request)
    {
        $id = $request->criteria;
        $adminData = SuperAdmin::findOrFail($id);
        $this->data('profileData', $adminData);
        return view($this->pagePath . 'super-admin.show', $this->data);
    }

    public function status(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->admin_id;
            $findData = SuperAdmin::findOrFail($criteria);
            if (isset($_POST['active'])) {
                $findData->status = 0;
                $message = "status was inactive";
            }
            if (isset($_POST['inactive'])) {
                $findData->status = 1;
                $message = "status was active";
            }

            if ($findData->update()) {
                return redirect()->back()->with('success', $message);
            }
        }
    }

    public function edit(Request $request)
    {
        $id = $request->criteria;
        $adminData = SuperAdmin::findOrFail($id);
        $this->data('adminData', $adminData);
        return view($this->pagePath . 'super-admin.update', $this->data);
    }

    public function update(Request $request)
    {
        $id = $request->criteria;
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|min:3|max:20|', [
                Rule::unique('super_admins', 'username')->ignore($id)
            ],
            'email' => 'required|email|', [
                Rule::unique('super_admins', 'email')->ignore($id)
            ],
            'gender' => 'required',
            'user_type' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $aObj = SuperAdmin::findOrFail($id);
        $aObj->name = $request->name;
        $aObj->username = $request->username;
        $aObj->email = $request->email;
        $aObj->gender = $request->gender;
        $aObj->user_type = $request->user_type;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $imagName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/super-admin/');
            if ($this->deleteFile($id) && $file->move($uploadPath, $imagName)) {
                $aObj->image = $imagName;
            }

        }

        if ($aObj->update()) {
            return redirect()->route('super-admin')->with('success', 'Data was updated');
        } else {
            return redirect()->back()->with('error', 'there was a problems');
        }


    }
}
