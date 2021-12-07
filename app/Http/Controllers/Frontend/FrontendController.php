<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public $frontendPath = "frontend.";
    public $pagePath;

    public function __construct()
    {
        $this->data('settingData', Setting::first());
        $this->pagePath = $this->frontendPath . 'pages.';
    }
}
