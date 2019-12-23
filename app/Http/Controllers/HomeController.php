<?php

namespace App\Http\Controllers;

use App\Blog;
use App\City;
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
        $blogs = Blog::where('frontend_visibility', 1)->get();
        $posts = Blog::take(2)->get(['title', 'description'])->toArray();
        return view('welcome', compact('blogs'));
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
