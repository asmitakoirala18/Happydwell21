<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public $backendPath = 'backend.';
    public $pagePath = '';

    public function __construct()
    {
        $sellerPropertyData = Property::select('properties.*',
            'seller_properties.property_id',
            'seller_properties.seller_id',
            'sellers.id','sellers.name','sellers.image as seller_photo')
            ->join('seller_properties', 'properties.id', '=', 'seller_properties.property_id')
            ->join('sellers', 'seller_properties.seller_id', '=', 'sellers.id')
            ->where('is_verify', '=', 0)
            ->get();
        $this->data('sellerPropertyData', $sellerPropertyData);
        $this->pagePath = $this->backendPath . 'pages.';
    }
}
