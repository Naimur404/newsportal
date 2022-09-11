<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function setting(){
        $data = Setting::where('id',1)->first();

        return view('admin.setting',compact('data'));
    }
    public function update(Request $request){
        $request->validate([

            'news_tricker_total' =>'required',
            'video_total' =>'required'



        ]);
          $data = Setting::where('id',1)->first();
          $data->news_tricker_total = $request->news_tricker_total;
          $data->news_ticker_status = $request->news_ticker_status;
          $data->video_total = $request->video_total;
          $data->video_status = $request->video_status;

          $data->top_bar_date_status = $request->top_bar_date_status;
          $data->top_bar_email = $request->top_bar_email;
          $data->top_bar_email_status = $request->top_bar_email_status;

          $data->theme_color_1 = $request->theme_color_1;
          $data->theme_color_2 = $request->theme_color_2;
          $data->analytic_id = $request->analytic_id;
          $data->analytic_id_status = $request->analytic_id_status;
          $data->disqus = $request->disqus;

          if($request->hasFile('logo')){

            $request->validate([

                'logo' =>'mimes:png,jpg,jpeg,gif'



            ]);
            unlink(public_path('font_asset/uploads/'.$data->logo));

            $ext = $request->file('logo')->extension();
            $final_name = 'logo'.'.'.$ext;
            $request->file('logo')->move(public_path('font_asset/uploads'),$final_name);
            $data->logo = $final_name;


          }

          if($request->hasFile('favicon')){

            $request->validate([

                'favicon' =>'mimes:png,jpg,jpeg,gif'



            ]);
            unlink(public_path('font_asset/uploads/'.$data->favicon));

            $ext = $request->file('favicon')->extension();
            $final_name = 'favicon'.'.'.$ext;
            $request->file('favicon')->move(public_path('font_asset/uploads'),$final_name);
            $data->favicon = $final_name;


          }



          $data->update();
          return redirect()->back()->with('success','Update Successfully');
    }
}
