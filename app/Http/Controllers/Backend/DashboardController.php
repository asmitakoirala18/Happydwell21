<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Contact;
use App\Models\Seller;
use Illuminate\Http\Request;

class DashboardController extends BackendController
{

    public function index()
    {

        return view($this->pagePath . 'dashboard.dashboard', $this->data);
    }

    public function buyerList()
    {
        $bData = Buyer::orderBy('id', 'desc')->get();
        $this->data('bData', $bData);
        return view($this->pagePath . 'buyer-list.index', $this->data);
    }

    public function sellerList()
    {
        $sData = Seller::orderBy('id', 'desc')->get();
        $this->data('sellerData', $sData);
        return view($this->pagePath . 'seller-list.index', $this->data);
    }

    public function sellerVerify(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $sellerId = $request->criteria;
            $sellerObject = Seller::findOrFail($sellerId);
            if (isset($_POST['seller_verify'])) {
                $sellerObject->seller_verify = 0;
                $message = "Seller not verified";

            }
            if (isset($_POST['seller_not_verify'])) {
                $sellerObject->seller_verify = 1;
                $message = "Seller was verified";
            }

            if ($sellerObject->update()) {
                return redirect()->back()->with('success', $message);
            }

        }
    }

    public function contact()
    {
        $contactData = Contact::orderBy('id', 'desc')->get();
        $this->data('newMail', Contact::where('status', '=', 0)->count());
        $this->data('contactData', $contactData);
        return view($this->pagePath . 'contact.index', $this->data);
    }

    public function contactView(Request $request)
    {
        $id = $request->criteria;
        $obj = Contact::findOrFail($id);
        $obj->status = 1;
        $obj->update();
        $this->data('contactData', $obj);
        return view($this->pagePath . 'contact.details', $this->data);
    }

    public function contactDelete(Request $request)
    {
        $id = $request->criteria;
        if (Contact::findOrFail($id)->delete()) {
            return redirect()->back()->with('success', 'Message was deleted');
        }

    }
}
