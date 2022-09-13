<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SitemapController extends Controller
{




    public function index(Request $r)
    {

        $posts = Post::orderBy('id','desc')->get();

        return response()->view('sitemap', compact('posts'))
          ->header('Content-Type', 'text/xml');

    }
}

