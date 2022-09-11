<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\OnlinePoll;
use App\Models\Photo;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminHomeConyroller extends Controller
{
   public function index(){
    $category = Category::count();
    $post = Post::count();
    $sub_cat = SubCategory::count();
    $photo = Photo::count();
    $video = Video::count();
    $faq = Faq::count();
    $poll = OnlinePoll::count();
    $subs = Subscriber::where('status',1)->count();
    return view('admin.dashboard',compact('category','post','sub_cat','photo','video','faq','poll','subs'));
   }
}
