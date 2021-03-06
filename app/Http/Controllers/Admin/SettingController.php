<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
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
            'key' => 'required|unique:settings,key',
            'value' => 'required',
        ]);

        $setting = new Setting();
        $setting->key = $request->get('key');
        $setting->value = $request->get('value');
        $setting->save();

        return redirect()->back()->with('success', 'Setting key and value added successfully!');

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
        $setting = Setting::find($id);

        if (!$setting) {
            return redirect()->back()->with('warning', 'The setting you wanted to edit does not exist!');
        }

        return view('admin.settings.edit', compact('setting'));
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
            'key' => 'required|unique:settings,key,'.$id,
            'value' => 'required',
        ]);

        $setting = Setting::find($id);
        $setting->key = $request->get('key');
        $setting->value = $request->get('value');
        $setting->save();

        return redirect()->back()->with('success', 'Setting key and value added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);

        if ($setting) {
            $setting->delete();
        }

        return redirect()->back()->with('success', 'Setting deleted successfully!');
    }
}
