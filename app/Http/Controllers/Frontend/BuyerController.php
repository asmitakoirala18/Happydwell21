<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\BuyerPasswordResetMail;
use App\Models\Buyer;
use App\Models\BuyerPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BuyerController extends FrontendController
{

    public function index()
    {

        return view('buyer.buyer', $this->data);
    }

    public function login()
    {
        return view($this->frontendPath . 'login.index', $this->data);
    }

    public function loginAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;

        if (Auth::guard('web')->attempt(['username' => $username, 'password' => $password])) {

            if (session()->has('last_property_page_id')) {
                $lastUrl = session('last_property_page_id');
                session(['buyers_login_data' => Auth::guard('web')->user()]);
                $request->session()->forget('last_property_page_id');
                return redirect()->intended($lastUrl);
            } else {
                return redirect()->intended(route('index'));
            }


        } else {

            return redirect()->back()->with('error', 'invalid access');
        }


    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->forget('buyers_login_data');
        return redirect()->route('login');
    }


    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->frontendPath . 'login.register', $this->data);
        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required|min:3',
                'username' => 'required|min:3|max:20|unique:buyers,username',
                'email' => 'required|email|unique:buyers,email',
                'password' => 'required|min:5|max:20|confirmed',
                'password_confirmation' => 'required',
                'gender' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $bObj = new Buyer();
            $bObj->name = $request->name;
            $bObj->username = $request->username;
            $bObj->email = $request->email;
            $bObj->password = bcrypt($request->password);
            $bObj->gender = $request->gender;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $imagName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/buyers/');
                if (!$file->move($uploadPath, $imagName)) {
                    return redirect()->back()->with('error', 'file upload errors');
                }
                $bObj->image = $imagName;
            }

            if ($bObj->save()) {
                return redirect()->back()->with('success', 'Account was successfully created');
            } else {
                return redirect()->back()->with('error', 'there was a problems');
            }

        }

    }


    public function passwordReset(Request $request)
    {

        if ($request->isMethod('get')) {
            return view($this->frontendPath . 'login.reset', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email'
            ]);

            $email = $request->email;

            $findRecord = Buyer::where('email', '=', $email)->count();

            if ($findRecord > 0) {
                $token = md5(microtime());
                BuyerPasswordReset::create([
                    'email' => $email,
                    'token' => $token
                ]);
                $sendUrl = url("buyer-password-reset-process?token={$token}&email={$email}");
                $data['email'] = env('MAIL_USERNAME');;
                $data['url'] = $sendUrl;
                Mail::to($email)->send(new BuyerPasswordResetMail($data));
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

            $totalRequest = BuyerPasswordReset::where('email', '=', $email)
                ->where('token', '=', $token)
                ->count();

            if ($totalRequest > 0) {
                return view('frontend.login.password-reset-success', $this->data);
            } else {
                return redirect()->route('login')->with('error', 'invalid email and token');
            }
        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'password' => 'required|min:5|max:20|confirmed',
                'password_confirmation' => 'required',
            ]);
            $sellerData = Buyer::where('email', '=', $email)->first();
            $sellerData->password = bcrypt($request->password);
            $sellerData->save();
            BuyerPasswordReset::where('email', '=', $email)->delete();
            return redirect()->route('login')->with('success', 'password was successfully changed');
        }

    }
}
