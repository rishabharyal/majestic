<?php

namespace App\Http\Controllers\Admin;

use App\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MediaUploader; //use the facade 
use App\Services\Media;

class PortfolioController extends Controller
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
        $portfolios = Portfolio::all();
        return view('admin.portfolios.index', compact('portfolios'));
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
            'name' => 'required',
            'description' => 'required',
        ]);

        $portfolio = new Portfolio();
        $portfolio->name = $request->get('name');
        $portfolio->designation = $request->get('designation');
        $portfolio->description = $request->get('description');
        $portfolio->save();


        if ($request->hasFile('image')) {
            $this->media->attach($portfolio, $request->file('image'), 'portfolio');
        }

        return redirect()->back()->with('success', 'portfolio added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->name = $request->get('name');
        $portfolio->designation = $request->get('designation');
        $portfolio->description = $request->get('description');
        $portfolio->save();

        if ($request->hasFile('image')) {
            $this->media->delete($portfolio);
            $this->media->attach($portfolio, $request->file('image'), 'portfolio');
        }

        return redirect()->back()->with('success', 'portfolio updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if (!$portfolio) {
            return redirect()->back()->with('warning', 'The portfolio you wanted to delete does not exist.');
        }

        $portfolio->delete();
        return redirect()->action('Admin\PortfolioController@index')->with('success', 'The portfolio has been deleted successfully');
    }

    public function deleteMedia(Request $request, $id)
    {
        $portfolio = Portfolio::find($id);
        if (!$portfolio) {
            return redirect()->action("Admin\PortfolioController@index")->with('warning', 'The portfolio does not exist!');
        }

        $this->media->delete($portfolio);

        return redirect()->back()->with('success', 'The image has been deleted successfully!');
    }
}
