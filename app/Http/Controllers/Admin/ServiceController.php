<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\Postcode;
use App\ServicePostcode;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $postcodes= Postcode::all();
        return view('admin.services.index', compact('services','postcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.services.create');
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
            'value' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $visibility = $request->get('visibility') ? 1 : 0;
        $service = new Service();
        $service->value = $request->get('value');
        $service->frontend_visibility = $visibility;
        $service->description = $request->get('description');
        $service->price = $request->get('price');
        $service->save();
        $service->postcodes()->sync($request->get('postcodes'));
        return redirect()->back()->with('message', 'Service added successfully!');
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
    public function edit(Service $service)
    { 
        $postcodes= Postcode::all();
        $selectedPostcodes = $service->postcodes()->pluck("id")->toArray();
        if (!$service) {
            return redirect()->back()->with('message', 'The requested service does not exist.');
        }
        return view('admin.services.edit', compact('service','postcodes','selectedPostcodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        if (!$service) {
            return redirect()->back()->with('message', 'The requested service does not exist.');
        }
        $this->validate($request, [
            'value' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $visibility = $request->get('visibility') ? 1 : 0;
        $service->value = $request->get('value');
        $service->frontend_visibility = $visibility;
        $service->description = $request->get('description');
        $service->price = $request->get('price');
        $service->save();
        $service->postcodes()->sync($request->get('postcodes'));
        return redirect()->back()->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if (!$service) {
            return redirect()->back()->with('message', 'The service does not exist!');
        }

        $service->delete();
        return redirect()->action('Admin\ServiceController@index')->with('message', 'service deleted successfully!');
    }
}
