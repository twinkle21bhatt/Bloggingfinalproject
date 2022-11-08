<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class LikeController extends Controller
{
    public function like($blog_id){
        $user = Auth::user();
        $blog = Blog::find($blog_id);
        if($user->blogLikes()->where('blog_id', $blog_id)->exists()){
            $blog->like = $blog->like - 1;
            $blog->save();
            $user->blogLikes()->detach($blog_id);
        }else{
            $blog->like = $blog->like + 1;
            $blog->save();
            $user->blogLikes()->attach($blog_id);
        }
        
        return redirect()->back();
    }
}
