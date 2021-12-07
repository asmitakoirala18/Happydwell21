<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\AdminPasswordResetMail;
use App\Models\AdminPasswordReset;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class AdminLoginController extends BackendController
{


    public function index()
    {

        return view($this->backendPath . 'login.index', $this->data);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;

        if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password])) {
            return redirect()->intended(route('company-backend'));
        } else {
            return redirect()->back()->with('error', 'username & password not match');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }

    public function passwordReset(Request $request)
    {

        if ($request->isMethod('get')) {
            return view($this->backendPath . 'login.reset', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email'
            ]);

            $email = $request->email;

            $findRecord = SuperAdmin::where('email', '=', $email)->count();

            if ($findRecord > 0) {
                $token = md5(microtime());
                AdminPasswordReset::create([
                    'email' => $email,
                    'token' => $token
                ]);
                $sendUrl = url("admin-password-reset-process?token={$token}&email={$email}");
                $data['email'] = env('MAIL_USERNAME');;
                $data['url'] = $sendUrl;
                Mail::to($email)->send(new AdminPasswordResetMail($data));
                return redirect()->back()->with('success', 'please check your mail box');


            } else {
                return redirect()->back()->with('error', 'invalid access');
            }
        }


    }

    function passwordResetProcess(Request $request)
    {
        $email = $request->email;
        $token = $request->token;

        if ($request->isMethod('get')) {

            $totalRequest = AdminPasswordReset::where('email', '=', $email)
                ->where('token', '=', $token)
                ->count();

            if ($totalRequest > 0) {
                return view('backend.login.password-reset-success', $this->data);
            } else {
                return redirect()->route('admin-login')->with('error', 'invalid email and token');
            }
        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'password' => 'required|min:5|max:20|confirmed',
                'password_confirmation' => 'required',
            ]);
            $sellerData = SuperAdmin::where('email', '=', $email)->first();
            $sellerData->password = bcrypt($request->password);
            $sellerData->save();
            AdminPasswordReset::where('email', '=', $email)->delete();
            return redirect()->route('admin-login')->with('success', 'password was successfully changed');
        }

    }
}
