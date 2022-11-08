<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')->with('blogs', Blog::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => "required|string",
            'content' => "required",
            'category_id' => 'required'
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $blog_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $blog_image);
            $input['image'] = $blog_image;
        }
        Blog::create([
            'title' => $input['title'],
            'image' => $input['image'],
            'slug' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit')->with('blog', $blog)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => "required|string",
            'content' => "required",
            'category_id' => 'required'
        ]);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category_id = $request->category_id;
        $blog->update();
        return  redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index');
    }

    public function blogComments(Blog $blog){
        $comments = Comment::where('blog_id', $blog->id)->orderBy('created_at', 'desc')->get();

        return view('blog.comments')->with('comments', $comments);
    }
}
