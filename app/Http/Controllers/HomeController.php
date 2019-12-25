<?php

namespace App\Http\Controllers;

use App\Blog;
use App\City;
use App\Service;
use App\Http\Controllers\ParentController;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities = City::all();
        $services = Service::where('frontend_visibility', 1)->get();;
        $blogs = Blog::where('frontend_visibility', 1)->get();
        $posts = Blog::where('is_post', 1)->take(2)->get();
        return view('welcome', compact('blogs', 'services', 'posts'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('services', compact('service'));
    }

    public function showAboutPage()
    {
        return view('about');
    }
    public function showTeamPage()
    {
        return view('team');
    }
    public function showContactPage()
    {
        return view('contactus');
    }
}
