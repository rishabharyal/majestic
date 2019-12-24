<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\Postcode;
use App\ServicePostcode;
use Illuminate\Http\Request;
use MediaUploader; //use the facade 
use App\Services\Media;

class ServiceController extends Controller
{
    private $media;

    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $postcodes = Postcode::all();
        return view('admin.services.index', compact('services', 'postcodes'));
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
            'price' => 'required',
            'slug' => 'required|unique:services,slug',
        ]);

        $service = new Service();

        $service->value = $request->get('value');
        $service->frontend_visibility = $request->get('visibility') ? 1 : 0;
        $service->description = $request->get('description');
        $service->price = $request->get('price');
        $service->slug = $request->get('slug');

        $service->save();
        $service->postcodes()->sync($request->get('postcodes'));

        if ($request->hasFile('image')) {
            $this->media->attach($service, $request->file('image'), 'service');
        }

        return redirect()->back()->with('success', 'Service added successfully!');
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
        $postcodes = Postcode::all();
        $selectedPostcodes = $service->postcodes()->pluck("id")->toArray();
        if (!$service) {
            return redirect()->back()->with('success', 'The requested service does not exist.');
        }
        return view('admin.services.edit', compact('service', 'postcodes', 'selectedPostcodes'));
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

        $this->validate($request, [
            'value' => 'required',
            'description' => 'required',
            'price' => 'required',
            'slug' => 'required|unique:services,slug,' . $id,
        ]);
        $service = Service::find($id);
        if (!$service) {
            return redirect()->back()->with('warning', 'The requested service does not exist.');
        }

        $visibility = $request->get('visibility') ? 1 : 0;

        $service->value = $request->get('value');
        $service->frontend_visibility = $visibility;
        $service->description = $request->get('description');
        $service->slug = $request->get('slug');
        $service->price = $request->get('price');

        $service->save();

        if ($request->hasFile('image')) {
            $this->media->delete($service);
            $this->media->attach($service, $request->file('image'), 'service');
        }

        $service->postcodes()->sync($request->get('postcodes'));
        return redirect()->back()->with('success', 'Service updated successfully');
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
            return redirect()->back()->with('warning', 'The service does not exist!');
        }

        $this->media->delete($service);

        $service->delete();

        return redirect()->action('Admin\ServiceController@index')->with('success', 'service deleted successfully!');
    }

    public function deleteMedia(Request $request, $id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->action("Admin\ServiceController@index")->with('warning', 'The service does not exist!');
        }

        $this->media->delete($service);

        return redirect()->back()->with('success', 'The image has been deleted successfully!');
    }
}
