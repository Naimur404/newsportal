<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class DisclaimController extends Controller
{
    public function index(){
        $data = Page::where('id',1)->first();
        return view('font.disclaim',compact('data'));
    }
}
