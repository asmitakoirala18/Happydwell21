<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Mail\SellerPasswordResetMail;
use App\Mail\SellerVerify;
use App\Models\Seller;
use App\Models\SellerContact;
use App\Models\SellerPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SellerController extends Controller
{

    public function index()
    {

        return view('seller.index', $this->data);
    }

    public function login()
    {
        return view('seller.login', $this->data);
    }

    public function loginAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;

        if (Auth::guard('seller')->attempt(['username' => $username, 'password' => $password])) {
            $sellerVData = Auth::guard('seller')->user()->seller_verify;
            if ($sellerVData > 0) {
                return redirect()->intended(route('seller'));
            } else {
                return redirect()->back()->with('error', 'verified your account first');
            }


        } else {
            return redirect()->back()->with('error', 'invalid access');
        }


    }

    public function sellerRegister(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('seller.register', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3',
                'username' => 'required|min:3|max:20|unique:sellers,username',
                'email' => 'required|email|unique:sellers,email',
                'password' => 'required|min:5|max:20|confirmed',
                'password_confirmation' => 'required',
                'gender' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif'
            ]);

            $bObj = new Seller();
            $bObj->name = $request->name;
            $bObj->username = $request->username;
            $bObj->email = $request->email;
            $bObj->password = bcrypt($request->password);
            $bObj->gender = $request->gender;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $imagName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/sellers/');
                if (!$file->move($uploadPath, $imagName)) {
                    return redirect()->back()->with('error', 'file upload errors');
                }
                $bObj->image = $imagName;
            }

            if ($bObj->save()) {
                $token = md5(microtime());
                $email = $request->email;
                $sendUrl = url("seller-verify-process?token={$token}&email={$email}");

                $data['email'] = env('MAIL_USERNAME');;
                $data['url'] = $sendUrl;
                Mail::to($email)->send(new SellerVerify($data));
                return redirect()->route('seller-login')->with('success', 'Account was successfully created login');
            } else {
                return redirect()->back()->with('error', 'there was a problems');
            }
        }
    }

    public function sellerVerifyProcess(Request $request)
    {

        $token = $request->token;
        $email = $request->email;
        $seller = Seller::where('email', '=', $email)->first();
        $seller->seller_verify = 1;
        $seller->update();
        return redirect()->route('seller-login')->with('success', 'your account was verify');


    }

    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller-login');
    }

    public function passwordReset(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('seller.password-reset', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email'
            ]);

            $email = $request->email;

            $findRecord = Seller::where('email', '=', $email)->count();

            if ($findRecord > 0) {
                $token = md5(microtime());
                SellerPasswordReset::create([
                    'email' => $email,
                    'token' => $token
                ]);
                $sendUrl = url("seller-password-reset-process?token={$token}&email={$email}");
                $data['email'] = env('MAIL_USERNAME');;
                $data['url'] = $sendUrl;
                Mail::to($email)->send(new SellerPasswordResetMail($data));
                return redirect()->back()->with('success', 'please check your mail box');


            } else {
                return redirect()->back()->with('error', 'invalid access');
            }
        }
    }

    public function passwordResetProcess(Request $request)
    {
        $email = $request->email;
        $token = $request->token;

        if ($request->isMethod('get')) {

            $totalRequest = SellerPasswordReset::where('email', '=', $email)
                ->where('token', '=', $token)
                ->count();

            if ($totalRequest > 0) {
                return view('seller.password-reset-success', $this->data);
            } else {
                return redirect()->route('seller-login')->with('error', 'invalid email and token');
            }
        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'password' => 'required|min:5|max:20|confirmed',
                'password_confirmation' => 'required',
            ]);
            $sellerData = Seller::where('email', '=', $email)->first();
            $sellerData->password = bcrypt($request->password);
            $sellerData->save();
            SellerPasswordReset::where('email', '=', $email)->delete();
            return redirect()->route('seller-login')->with('success', 'password was successfully changed');
        }

    }

    public function notVerify()
    {
        return view('seller.seller-not-verify', $this->data);
    }

    public function sellerContactList()
    {
        $sellerEmail = Auth::guard('seller')->user()->email;
        $this->data('sellerContactDataList',
            SellerContact::where('seller_email', '=', $sellerEmail)->get());
        return view('seller.seller-contact-list', $this->data);

    }

    public function sellerContactDetails(Request $request)
    {
        $id = $request->criteria;
        $contactData = SellerContact::findOrFail($id);
        $this->data('contactData', $contactData);
        return view('seller.seller-contact-details', $this->data);

    }
}

