<?php

namespace App\Http\Controllers\Admin;

use App\Cleaning;
use App\Http\Controllers\Controller;
use App\Identity;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = '';

        // dd($request->all());
        $cleanings  = new Cleaning();
        if ($request->get('search')) {
            foreach ($request->get('search') as $identityId => $quantity) {
                if ($identityId > 0) $query .= ',' . $quantity;
                else $query .=  $quantity;
            }
            $cleanings = $cleanings->where('type', $request->get('type'))->where('search_index', $query)->get();
        } else
            $cleanings = collect([]);
        $identities = Identity::all();
        return view('admin.quotation.index', compact('identities', 'cleanings', 'request'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
