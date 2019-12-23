<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.city.index', compact('cities'));
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
            'city' => 'required|min:5|unique:cities'
        ]);

        $city = new City();
        $city->city = $request->get('city');
        $city->save();

        return redirect()->back()->with('success', 'City added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);

        if (!$city) {
            return redirect()->back()->with('warning', 'The city you wanted to edit does not exist!');
        }

        return view('admin.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $city = City::find($id);

        if (!$city) {
            return redirect()->back()->with('warning', 'The city you wanted to edit does not exist!');
        }

        $this->validate($request, [
            'city' => 'required|min:5|unique:cities,city'
        ]);

        $city->city = $request->get('city');
        $city->save();

        return redirect()->back()->with('success', 'City updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$user) {
            return redirect()->back()->with('warning', 'The user you wanted to delete does not exist.');
        }

        $user->delete();
        return redirect()->action('Admin\UserController@index')->with('success', 'The user has been deleted successfully');
    }
}
