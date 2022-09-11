<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use App\Models\SidebarAdvertisement;
use App\Models\TopAdvertisement;
use Illuminate\Http\Request;

class AdminAdvertisementController extends Controller
{
    public function home_ad_show(){
        $data = HomeAdvertisement::where('id',1)->first();
        return  view('admin.home_ad',compact('data'));
    }
    public function home_ad_update(Request $request){
        $data = HomeAdvertisement::where('id',1)->first();
        $data->above_search_url = $request->above_search_url;
        $data->above_search_status = $request->above_search_status;
        $data->above_footer_url = $request->above_footer_url;
        $data->above_footer_status = $request->above_footer_status;
        if($request->hasFile('above_search_ad')){
            $request->validate([
                'above_search_ad' => 'image|mimes:png,jpg,jpeg',


            ]);
            unlink(public_path('font_asset/uploads/'.$data->above_search_ad));
            $ext = $request->file('above_search_ad')->extension();
            $final_name = 'above_search_ad'.'.'.$ext;
            $request->file('above_search_ad')->move(public_path('font_asset/uploads'),$final_name);
            $data->above_search_ad = $final_name;


          }

          if($request->hasFile('above_footer_ad')){
            $request->validate([
                'above_footer_ad' => 'image|mimes:png,jpg,jpeg',


            ]);
            unlink(public_path('font_asset/uploads/'.$data->above_footer_ad));
            $ext = $request->file('above_footer_ad')->extension();
            $final_name = 'above_footer_ad'.'.'.$ext;
            $request->file('above_footer_ad')->move(public_path('font_asset/uploads'),$final_name);
            $data->above_footer_ad = $final_name;


          }
        $data->update();
        return redirect()->back()->with('success','Update Successfully');
    }
    public function top_ad_show(){
        $data = TopAdvertisement::where('id',1)->first();
        return  view('admin.top_ad',compact('data'));
    }
    public function top_ad_update(Request $request){
        $data = TopAdvertisement::where('id',1)->first();
        $data->top_ad_url = $request->top_ad_url;
        $data->top_ad_status = $request->top_ad_status;

        if($request->hasFile('top_ad')){
            $request->validate([
                'top_ad' => 'image|mimes:png,jpg,jpeg',


            ]);
            unlink(public_path('font_asset/uploads/'.$data->top_ad));
            $ext = $request->file('top_ad')->extension();
            $final_name = 'top_ad'.'.'.$ext;
            $request->file('top_ad')->move(public_path('font_asset/uploads'),$final_name);
            $data->top_ad = $final_name;


          }


        $data->update();
        return redirect()->back()->with('success','Update Successfully');
    }
    public function sidebar_ad_show(){
        $sidebar_ad_data = SidebarAdvertisement::get();
        return view('admin.sidebar_ad_show',compact('sidebar_ad_data'));
    }
    public function sidebar_ad_create(){
        return view('admin.sidebar_ad_create');
    }
    public function sidebar_ad_submit(Request $request){
        $data = new SidebarAdvertisement();
        $data->sidebar_ad_url = $request->sidebar_ad_url;
        $data->sidebar_ad_location = $request->sidebar_ad_location;

        if($request->hasFile('sidebar_ad')){
            $request->validate([
                'sidebar_ad' => 'image|mimes:png,jpg,jpeg,webp|required',


            ]);


            $ext = $request->file('sidebar_ad')->extension();
            $final_name = time().'.'.$ext;
            $request->file('sidebar_ad')->move(public_path('font_asset/uploads'),$final_name);
            $data->sidebar_ad = $final_name;


          }


        $data->save();
        return redirect()->route('sidebar_ad_show')->with('success','Added Successfully');
    }
    public function sidebar_ad_edit($id){
        $data = SidebarAdvertisement::find($id);
        return view('admin.sidebar_ad_edit',compact('data'));
    }
    public function sidebar_ad_update(Request $request, $id){
        $data = SidebarAdvertisement::find($id);
        $data->sidebar_ad_url = $request->sidebar_ad_url;
        $data->sidebar_ad_location = $request->sidebar_ad_location;

        if($request->hasFile('sidebar_ad')){
            $request->validate([
                'sidebar_ad' => 'image|mimes:png,jpg,jpeg,webp|required',


            ]);

            unlink(public_path('font_asset/uploads/'.$data->sidebar_ad));
            $ext = $request->file('sidebar_ad')->extension();
            $final_name = time().'.'.$ext;
            $request->file('sidebar_ad')->move(public_path('font_asset/uploads'),$final_name);
            $data->sidebar_ad = $final_name;


          }


        $data->update();
        return redirect()->route('sidebar_ad_show')->with('success','Added Successfully');
    }
    public function sidebar_ad_delete($id){
        $data = SidebarAdvertisement::find($id);
        if($data->sidebar_ad !=''){
            unlink(public_path('font_asset/uploads/'.$data->sidebar_ad));
        }
        $data->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}
