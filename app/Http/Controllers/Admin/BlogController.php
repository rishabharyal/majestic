<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index',compact('blogs'));
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
            'title' => 'required',
            'description'=>'required',
        ]);
        $visibility = $request->get('visibility') ? 1 : 0;
        $blog = new Blog();
        $blog->title = $request->get('title');
        $blog->description = $request->get('description');
        $blog->frontend_visibility = $visibility;
        $blog->save();

        return redirect()->back()->with('success', 'Blog added successfully!'); 
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
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog)
    {
        $this->validate($request, [
            'title' => 'required',
            'description'=>'required',
        ]);
        $visibility = $request->get('visibility') ? 1 : 0;
        $blog->title = $request->get('title');
        $blog->description = $request->get('description');
        $blog->frontend_visibility = $visibility;
        $blog->save();

        return redirect()->back()->with('success', 'Blog added successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if (!$blog) {
            return redirect()->back()->with('warning', 'The blog does not exist!');
        }

        $blog->delete();
        return redirect()->action('Admin\BlogController@index')->with('success', 'blog deleted successfully!');
    }
}
