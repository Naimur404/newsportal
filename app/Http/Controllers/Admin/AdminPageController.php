<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function about(){
        $data = Page::first();
return view('admin.page_about',compact('data'));

    }
    public function about_update(Request $request,$id){
        $request->validate([
                'about_detail' => 'required',
                'about_title' => 'required'
        ]);
        $data = Page::find($id);
        $data->about_detail = $request->about_detail;
        $data->about_title = $request->about_title;
        $data->about_status = $request->about_status;
        $data->update();
        return redirect()->back()->with('success','Update Sucessfully');

    }
    public function faq(){
        $data = Page::first();
return view('admin.page_faq',compact('data'));

    }
    public function faq_update(Request $request,$id){
        $request->validate([
            'faq_detail' => 'required',
            'faq_title' => 'required'
    ]);
        $data = Page::find($id);

        $data->faq_title = $request->faq_title;
        $data->faq_detail = $request->faq_detail;
        $data->faq_status = $request->faq_status;

        $data->update();
        return redirect()->back()->with('success','Update Sucessfully');

    }
    public function contact(){
        $data = Page::first();
return view('admin.contact_page',compact('data'));

    }
    public function contact_update(Request $request,$id){
        $request->validate([
            'contact_detail' => 'required',
            'contact_title' => 'required'
    ]);
        $data = Page::find($id);
        $data->contact_detail = $request->contact_detail;
        $data->contact_title = $request->contact_title;
        $data->contact_status = $request->contact_status;
        $data->contact_map = $request->contact_map;
        $data->update();
        return redirect()->back()->with('success','Update Sucessfully');

    }
    public function login(){
        $data = Page::first();
return view('admin.login_page',compact('data'));

    }
    public function login_update(Request $request,$id){
        $request->validate([

            'login_title' => 'required'
    ]);
        $data = Page::find($id);

        $data->login_title = $request->login_title;
        $data->login_status = $request->login_status;

        $data->update();
        return redirect()->back()->with('success','Update Sucessfully');

    }
    public function terms(){
        $data = Page::first();
return view('admin.terms_page',compact('data'));

    }
    public function terms_update(Request $request,$id){
        $request->validate([
            'terms_detail' => 'required',
            'terms_title' => 'required'
    ]);
        $data = Page::find($id);

        $data->terms_title = $request->terms_title;
        $data->terms_detail = $request->terms_detail;
        $data->terms_status = $request->terms_status;

        $data->update();
        return redirect()->back()->with('success','Update Sucessfully');

    }
    public function privacy(){
        $data = Page::first();
return view('admin.privacy_page',compact('data'));

    }
    public function privacy_update(Request $request,$id){
        $request->validate([
            'privacy_detail' => 'required',
            'privacy_title' => 'required'
    ]);
        $data = Page::find($id);

        $data->privacy_title = $request->privacy_title;
        $data->privacy_detail = $request->privacy_detail;
        $data->privacy_status = $request->privacy_status;

        $data->update();
        return redirect()->back()->with('success','Update Sucessfully');

    }

    public function disclaim(){
        $data = Page::first();
return view('admin.disclaim_page',compact('data'));

    }
    public function disclaim_update(Request $request,$id){
        $request->validate([
            'disclaim_detail' => 'required',
            'disclaim_title' => 'required'
    ]);
        $data = Page::find($id);

        $data->disclaim_title = $request->disclaim_title;
        $data->disclaim_detail = $request->disclaim_detail;
        $data->disclaim_status = $request->disclaim_status;

        $data->update();
        return redirect()->back()->with('success','Update Sucessfully');

    }
}
