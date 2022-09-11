<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Author;
use App\Models\HomeAdvertisement;
use App\Models\Post;
use App\Models\Setting;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\TopAdvertisement;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $home_ad_data = HomeAdvertisement::where('id',1)->first();

        $setting_data = Setting::where('id',1)->first();
        $all_post = Post::with('subCategory')->orderby('id','desc')->get();
        $sub_category_data = Category::with('aPost')->where('is_home',1)->get();

        $video = Video::get();
        $category = Category::orderBy('category_order','asc')->get();



      return view('font.home' ,compact('home_ad_data','setting_data','all_post','sub_category_data','video','category'));
    }
    public function sub_category($id){
        $sub_category = SubCategory::where('category_id',$id)->orderBy('sub_category_order','asc')->get();
        $response = "<option value=''>Seletct SubCategory</option>";
        foreach($sub_category as $data){
            $response.='<option value="'.$data->id.'">'.$data->sub_category_name.'</option>';
        }
        return response()->json(['sub_category_data'=>$response]);

    }
    public function search_result(Request $request){


      $post_data = Post::with('subCategory')->orderBy('id','desc');
    //   if($request->text_search != '' && $request->sub_category != ''){
    //     $post_data = $post_data->where('post_title','like','%'.$request->text_search.'%')->where('sub_category_id',$request->sub_category);
    //   }
      if($request->text_search != ''){
        $title = $request->text_search;
        $post_data = $post_data->where('post_title','like','%'.$request->text_search.'%');
      }

      if($request->sub_category != ''){
           $title = 'Sub Category';
        $post_data = $post_data->where('sub_category_id',$request->sub_category);
      }
      $post_data = $post_data->paginate(10);
      return view('font.search_result',compact('title','post_data'));


    }
}
