<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use MediaUploader; //use the facade 
use App\Services\Media;

class BlogController extends Controller
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
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
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
            'description' => 'required',
            'slug' => 'required|unique:blogs,slug',
        ]);
        $blog = new Blog();
        $blog->frontend_visibility = $request->get('visibility') ? 1 : 0;
        $blog->is_post = $request->get('is_post') ? 1 : 0;
        $blog->title = $request->get('title');
        $blog->slug = $request->get('slug');
        $blog->description = $request->get('description');
        $blog->save();

        if ($request->hasFile('image')) {
            $this->media->attach($blog, $request->file('image'), 'blog');
        }
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
        $images = $blog->getMedia('default');
        return view('admin.blogs.edit', compact('blog', 'images'));
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
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:blogs,slug,' . $id,
        ]);
        $blog = Blog::find($id);
        $blog->title = $request->get('title');
        $blog->slug = $request->get('slug');
        $blog->description = $request->get('description');
        $blog->frontend_visibility = $request->get('visibility') ? 1 : 0;
        $blog->is_post = $request->get('is_post') ? 1 : 0;
        $blog->save();


        if ($request->hasFile('image')) {
            $this->media->attach($blog, $request->file('image'), 'blog');
        }

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
    public function deleteMedia(Request $request, $id)
    {
        $image_id = $request->get('image_id');
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect()->action("Admin\BlogController@index")->with('warning', 'The blog does not exist!');
        }

        $this->media->delete($blog, $image_id);

        return redirect()->back()->with('success', 'The image has been deleted successfully!');
    }
}
