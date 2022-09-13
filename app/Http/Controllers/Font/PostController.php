<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Author;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;

class PostController extends Controller
{
    public function detail($slug){
        $post = Post::with('subCategory','mCategory')->where('slug',$slug)->first();
        $tags = Tag::where('post_id',$post->id)->get();

        //update page view count
        $new_view = $post->visitors+1;
        $post->visitors = $new_view;
        $post->update();
        $related_post = Post::with('subCategory')->where('sub_category_id',$post->sub_category_id)->orderBy('id','desc')->take(4)->get();
        return view('font.post',compact('post','tags','related_post'));
    }
}
