<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use App\Postcode;
use Illuminate\Http\Request;

class PostcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postcodes = Postcode::all();
        $cities = City::all();
        $title = 'Postcodes';
        return view('admin.postcode.index', compact('postcodes', 'title', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'postcode' => 'required|unique:postcodes'
        ]);

        $postcode = new Postcode();
        $postcode->postcode = $request->get('postcode');
        $postcode->city_id = $request->get('city');
        $postcode->save();

        return redirect()->back()->with('success', 'Postcode added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postcode  $postcode
     * @return \Illuminate\Http\Response
     */
    public function show(Postcode $postcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postcode  $postcode
     * @return \Illuminate\Http\Response
     */
    public function edit(Postcode $postcode)
    {
        if (!$postcode) {
            return redirect()->back()->with('warning', 'The requested postcode does not exist.');
        }

        return view('admin.postcode.edit', compact('postcode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postcode  $postcode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postcode $postcode)
    {
        if (!$postcode) {
            return redirect()->back()->with('warning', 'The requested postcode does not exist.');
        }

        $postcode->postcode = $request->get('postcode');
        $postcode->save();

        return redirect()->back()->with('success', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postcode  $postcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postcode $postcode)
    {
        if (!$postcode) {
            return redirect()->back()->with('warning', 'The postcode does not exist!');
        }

        $postcode->delete();
        return redirect()->action('Admin\PostcodeController@index')->with('success', 'Postcode deleted successfully!');
    }
}
