<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class UserBlogController extends Controller
{
    public function singleBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('blog_single')
                    ->with('blog', $blog)
                    ->with('comments', Comment::where('blog_id', $blog->id)->orderBy('created_at','DESC')->get());
    }
}
