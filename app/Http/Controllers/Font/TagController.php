<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;


class TagController extends Controller
{
    public function show($tag_name){
      $tag_data =  Tag::where('tag_name',$tag_name)->get();
      $all_post_id = [];
      foreach($tag_data as $data){
          $all_post_id[]=$data->post_id;
        }
        $all_post = Post::orderBy('id','desc')->get();
        return view('font.tag_post',compact('tag_name','all_post_id','all_post'));

    }
}
