<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminPostController extends Controller
{
    public function show(){
        $posts =  Post::with('subCategory.rCategory')->orderBy('id','asc')->get();
        return view('admin.admin_post_show',compact('posts'));
        }
        public function create(){
            $sub_category = SubCategory::with('rCategory')->get();

            return view('admin.admin_post_create',compact('sub_category'));
            }
            public function post_store(Request $request){

                $request->validate([
                    'post_title' => 'required',
                    'post_desc' => 'required',
                    'short_desc' => 'required',
                    'post_photo' =>'required|mimes:png,jpg,jpeg,gif'



                ]);
                $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
                $ai_id = $q[0]->Auto_increment;

                $data = new Post();
                $data->post_title = $request->post_title;
                $data->slug = preg_replace('/\s+/u', '-', trim($request->post_title));
                $data->short_desc = $request->short_desc;
                $data->post_desc = $request->post_desc;
                $data->sub_category_id= $request->sub_category_id;
                $data->is_share = $request->is_share;
                $data->is_comment = $request->is_comment;
                $data->is_home = $request->is_home;

                $data->visitors = 1;
                $data->admin_id = Auth::guard('admin')->user()->id;
                $data->author_id = 0;


                if($request->hasFile('post_photo')){



                    $ext = $request->file('post_photo')->extension();
                    $final_name = time().'.'.$ext;
                    $request->file('post_photo')->move(public_path('font_asset/uploads'),$final_name);
                    $data->post_photo = $final_name;


                  }
                  $cat_id = SubCategory::where('id',$request->sub_category_id)->first();
                  $data->category_id = $cat_id->category_id;
                $data->save();
                $new_tag_array = [];
                if($request->tags !=''){
                    //for remove duplicate
                $tags_array = explode(',',$request->tags);
                foreach($tags_array as $data){
                    $new_tag_array[] = trim($data);
                }
                $new_tag_array = array_values(array_unique($new_tag_array));
                 foreach($new_tag_array as $data){
                    $tag = new Tag();
                    $tag->post_id = $ai_id;
                    $tag->tag_name = $data;
                    $tag->save();

                 }
                }
                if($request->subscriber_send_option == 1){
                  $link =  '<a href="'.route('post_detail',$ai_id).'" class="btn btn-primary">See Post</a>';
                    $data = ['link' => $link,'title'=>'A New Post Is Published','title2' => 'Hi, A new post is published into our website, Please go to see that post'];


                   $subscriber =  Subscriber::where('status',1)->get();
                   foreach ($subscriber as $subs){
                    $user = $subs->email;
                    Mail::send('font/subscriber_email', $data, function ($message) use ($user) {
                        $message->to($user);
                        $message->subject('A New Post Is Published');
                    });
                   }

                }
                return redirect()->back()->with('success','Added Successfully');
            }
            public function post_edit($id){

                $post_data = Post::find($id);
                $sub_category = SubCategory::with('rCategory')->get();
                $tags = Tag::where('post_id',$id)->get();
                return view('admin.admin_post_edit',compact('post_data','sub_category','tags'));
            }



            public function post_update(Request $request,$id){


                $request->validate([

                    'post_photo' =>'mimes:png,jpg,jpeg,gif'



                ]);


                $data = Post::find($id);
                $data->post_title = $request->post_title;
                $data->slug = preg_replace('/\s+/u', '-', trim($request->post_title));
                $data->short_desc = $request->short_desc;
                $data->post_desc = $request->post_desc;
                $data->sub_category_id= $request->sub_category_id;
                $data->is_share = $request->is_share;
                $data->is_comment = $request->is_comment;
                $data->is_home = $request->is_home;

                $data->visitors = 1;
                $data->admin_id = Auth::guard('admin')->user()->id;
                $data->author_id = 0;


                if($request->hasFile('post_photo')){

                    $request->validate([

                        'post_photo' =>'mimes:png,jpg,jpeg,gif'



                    ]);
                    unlink(public_path('font_asset/uploads/'.$data->post_photo));

                    $ext = $request->file('post_photo')->extension();
                    $final_name = time().'.'.$ext;
                    $request->file('post_photo')->move(public_path('font_asset/uploads'),$final_name);
                    $data->post_photo = $final_name;


                  }
                  $cat_id = SubCategory::where('id',$request->sub_category_id)->first();
                  $data->category_id = $cat_id->category_id;

                $data->update();


                if($request->tags !=''){
                $tags_array = explode(',',$request->tags);
                 foreach($tags_array as $data){
                    //for check duplicate value not added
                    $total = Tag::where('post_id',$id)->where('tag_name',trim($data))->count();
                    if(!$total){
                        $tag = new Tag();
                        $tag->post_id = $id;
                        $tag->tag_name = trim($data);
                        $tag->save();
                    }


                 }
                }
                return redirect()->route('admin_post_show')->with('success','Update Successfully');
            }
            public function post_tag_delete($id,$pid){
                $data = Tag::find($id);
                $data->delete();
                return redirect()->route('admin_post_edit',$pid)->with('success','Delete Successfully');
            }
            public function post_delete($id){
                $data = Post::find($id);
                Tag::where('post_id',$id)->delete();
                if($data->post_photo !=''){
                    unlink(public_path('font_asset/uploads/'.$data->post_photo));
                }
                $data->delete();

                return redirect()->back()->with('success','Deleted Successfully');
            }
}
