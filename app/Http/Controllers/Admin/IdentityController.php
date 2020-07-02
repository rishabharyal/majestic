<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Identity;
use Illuminate\Http\Request;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identities = Identity::all();
        return view('admin.identities.index', compact('identities'));
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
            'title' => 'required|min:2|unique:identities,title'
        ]);

        $identity = new Identity();
        $identity->title = $request->get('title');
        $identity->save();

        return redirect()->back()->with('success', 'Identity added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Identity  $identity
     * @return \Illuminate\Http\Response
     */
    public function show(Identity $identity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Identity  $identity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $identity = Identity::find($id);
        if (!$identity) {
            return redirect()->back()->with('warning', 'The identity you wanted to edit does not exist!');
        }

        return view('admin.identities.edit', compact('identity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Identity  $identity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $identity = Identity::find($id);
        if (!$identity) {
            return redirect()->back()->with('warning', 'The Identity you wanted to edit does not exist!');
        }

        $this->validate($request, [
            'title' => 'required|min:2|unique:identities,title,' . $id,
        ]);

        $identity->title = $request->get('title');
        $identity->save();

        return redirect()->back()->with('success', 'Identity added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Identity  $identity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $identity = Identity::find($id);
        if (!$identity) {
            return redirect()->back()->with('warning', 'The Identity you wanted to delete does not exist.');
        }

        $identity->delete();
        return redirect()->action('Admin\IdentityController@index')->with('success', 'The Identity has been deleted successfully');
    }
}
