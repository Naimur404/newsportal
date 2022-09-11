<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $data = Page::where('id',1)->first();
        return view('font.about',compact('data'));
    }
}
