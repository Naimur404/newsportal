<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    public function index($id){
        $cat = Category::where('id',$id)->first();
        $cat_post = Post::where('category_id',$id)->orderBy('id','desc')->paginate(10);


          return view('font.category_all_post',compact('cat','cat_post'));
    }
    public function sub_cat($id){
        $cat = SubCategory::where('id',$id)->first();
        $cat_post = Post::where('sub_category_id',$id)->orderBy('id','desc')->paginate(10);


          return view('font.sub_cat_post',compact('cat','cat_post'));
    }
}
