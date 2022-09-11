<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index(){
        $data = Page::where('id',1)->first();
        return view('font.terms',compact('data'));
    }
}
