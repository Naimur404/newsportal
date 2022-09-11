<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuhtorHomeController extends Controller
{
    public function home(){
        $post = Post::where('author_id',Auth::guard('author')->user()->id)->count();
        return view('author.author_home',compact('post'));
    }
}
