<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\ContactMail;
use App\Models\About;
use App\Models\AdminContactProperty;
use App\Models\Blog;
use App\Models\Buyer;
use App\Models\Contact;
use App\Models\Property;
use App\Models\Seller;
use App\Models\SellerContact;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ApplicationController extends FrontendController
{

    public function index()
    {
        $sliderData = Property::where('is_slider', '=', 1)
            ->where('is_verify', '=', 1)->get();
        $this->data('sliderData', $sliderData);
        $this->data('blogData', Blog::orderBy('id', 'desc')->get());
        $propertyData = Property::orderBy('id', 'desc')
            ->where('is_verify', '=', 1)
            ->get();
        $this->data('propertyData', $propertyData);
        $this->data('serviceType', ServiceType::all());
        return view($this->pagePath . 'home.home', $this->data);
    }

    public function about()
    {
        $this->data('aboutData', About::all());
        return view($this->pagePath . 'about.about', $this->data);
    }

    public function contact()
    {
        return view($this->pagePath . 'contact.contact', $this->data);
    }

    public function contactAction(Request $request)
    {
        $obj = new Contact();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->subject = $request->subject;
        $obj->message = $request->message;
        $obj->save();
        $to = env('MAIL_USERNAME');
        Mail::to($to)->send(new ContactMail($obj));
        return response()->json(['success' => 'OK'], 200);

    }

    public function propertyList()
    {
        $this->data('propertyData', Property::orderBy('id', 'desc')
            ->where('is_verify', '=', 1)->get());
        return view($this->pagePath . 'property.index', $this->data);
    }

    public function propertyDetails(Request $request)
    {
        $criteria = $request->criteria;

        $sellerData = Seller::select('sellers.*', 'properties.id',
            'properties.slug', 'seller_properties.*')
            ->join('seller_properties', 'sellers.id', 'seller_properties.seller_id')
            ->join('properties', 'properties.id', 'seller_properties.property_id')
            ->where('properties.slug', '=', $criteria)
            ->first();


        $product = Property::where('slug', '=', $criteria)->first();
        $product->page_visit += 1;
        $product->save();
        $types = $product->types;
        $this->data('relatedProperty', Property::where('types', '=', $types)
            ->where('slug', '!=', $criteria)
            ->get());
        $this->data('property', $product);
        $this->data('sellerData', $sellerData);
        return view($this->pagePath . 'property.property-details', $this->data);
    }

    public function propertySearch(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $title = $request->title;
            if (empty($title)) {
                $title = "zzzzz";
            }

            $types = $request->types;
            $state_name = $request->state_name;
            $bedrooms = $request->bedrooms;
            $bathrooms = $request->bathrooms;
            $garages = $request->garages;
            $price = $request->price;
            $productData = Property::where('title', 'LIKE', '%' . $title . '%')
                ->orWhere('types', '=', $types)
                ->orWhere('state_name', 'LIKE', '%' . $state_name . '%')
                ->orWhere('bedrooms', 'LIKE', '%' . $bedrooms . '%')
                ->orWhere('bathrooms', 'LIKE', '%' . $bathrooms . '%')
                ->orWhere('garages', 'LIKE', '%' . $garages . '%')
                ->orWhere('price', 'LIKE', '%' . $price . '%')
                ->get();
            $this->data('propertyData', $productData);
            return view($this->pagePath . 'property.index', $this->data);
        }
    }

    public function propertyFilter(Request $request)
    {

        $criteria = $request->criteria;
        if ($criteria == 'for_rent') {
            $this->data('propertyData', Property::where('types', '=', 'rent')->get());
            return view($this->pagePath . 'property.index', $this->data);
        } elseif ($criteria == 'for_sale') {
            $this->data('propertyData', Property::where('types', '=', 'sale')->get());
            return view($this->pagePath . 'property.index', $this->data);
        } elseif ($criteria == 'buy') {
            $this->data('propertyData', Property::where('types', '=', 'buy')->get());
            return view($this->pagePath . 'property.index', $this->data);
        } else {
            $this->data('propertyData', Property::orderBy('id', 'desc')->get());
            return view($this->pagePath . 'property.index', $this->data);

        }

    }

    public function blogList()
    {
        $this->data('blogData', Blog::orderBy('id', 'desc')->get());
        return view($this->pagePath . 'blog.index', $this->data);
    }

    public function blogDetails(Request $request)
    {
        $criteria = $request->criteria;
        $blogData = Blog::where('slug', '=', $criteria)->first();
        $this->data('blogData', $blogData);
        return view($this->pagePath . 'blog.blog-details', $this->data);
    }

    public function contactSeller(Request $request)
    {
        if (!Auth::guard('web')->user()) {
            session(['last_property_page_id' => url()->previous()]);
            return redirect()->route('login');
        }

        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $email = $request->email;
            $buyer = Buyer::where('email', '=', $email)->count();
            if ($buyer > 0) {
                $data['seller_email'] = $request->seller_criteria;
                $data['name'] = $request->name;
                $data['email'] = $request->email;
                $data['message'] = $request->message;
                SellerContact::create($data);
                return redirect()->back()->with('success', 'Thanks for contact ');
            } else {
                session(['last_property_page_id' => url()->previous()]);
                return redirect()->route('login');
            }


        }
    }


    public function contactAdmin(Request $request)
    {
        if (!Auth::guard('web')->user()) {
            session(['last_property_page_id' => url()->previous()]);
            return redirect()->route('login');
        }

        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $data['seller_email'] = $request->seller_criteria;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['message'] = $request->message;
            AdminContactProperty::create($data);
            return redirect()->back()->with('success', 'Thanks for contact ');

        }
    }


    public function serviceType(Request $request)
    {
        $type = ServiceType::where('slug', '=', $request->criteria)->first();
        $this->data('serviceTypeData', $type);
        return view($this->pagePath . 'service.service-type', $this->data);
    }

    public function service(Request $request)
    {
        $serviceData = Service::all();
        $this->data('serviceData', $serviceData);
        return view($this->pagePath . 'service.service', $this->data);
    }

    public function serviceDetails(Request $request)
    {
        $serviceData = Service::where('slug', '=', $request->criteria)->first();
        $this->data('serviceData', $serviceData);
        return view($this->pagePath . 'service.service-details', $this->data);
    }

    public function postRating(Request $request)
    {
        if (!Auth::guard('web')->user()) {
            session(['last_property_page_id' => url()->previous()]);
            return redirect()->route('login');
        }

        request()->validate(['rate' => 'required']);
        $post = Property::findOrFail($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = Auth::guard('web')->user()->id;
        $post->ratings()->save($rating);
        return redirect()->back();
    }
}
