<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    public function create(){
        return view('admin.video_create');
    }
    public function show(){
        $video =  Video::orderBy('id','desc')->get();
        return view('admin.video_show',compact('video'));
        }
        public function video_store(Request $request){

            $request->validate([

                'caption' => 'required',
                'video_id' =>'required'



            ]);


            $data = new Video();
            $data->video_id = $request->video_id;
            $data->caption = $request->caption;





            $data->save();


            return redirect()->back()->with('success','Added Successfully');
        }
        public function video_edit($id){

            $data = Video::find($id);
         ;
            return view('admin.video_edit',compact('data'));
        }

        public function video_update(Request $request,$id){


            $request->validate([

                'video_id' =>'required',
                'caption' => 'required'



            ]);


            $data = Video::find($id);
            $data->video_id = $request->video_id;
            $data->caption = $request->caption;





            $data->update();




            return redirect()->route('admin_video_edit',$id)->with('success','Update Successfully');
        }
        public function video_delete($id){
            $data = Video::find($id);


            $data->delete();

            return redirect()->back()->with('success','Deleted Successfully');
        }

}
