<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $data = Page::where('id',1)->first();
        $faq_data = Faq::get();
        return view('font.faq',compact('data','faq_data'));
    }
}
