<?php

namespace App\Http\Controllers;

use App\Service;
use App\Setting;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function __construct() {
    	view()->share('services', Service::where('frontend_visibility', 1)->get());
    	view()->share('settings', Setting::pluck('value', 'key')->toArray());
    }
}
