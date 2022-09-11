<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function create(){
        return view('admin.photo_create');
    }
    public function show(){
        $photo =  Photo::orderBy('id','desc')->get();
        return view('admin.photo_show',compact('photo'));
        }
        public function photo_store(Request $request){

            $request->validate([

                'caption' => 'required',
                'photo' =>'required|mimes:png,jpg,jpeg,gif'



            ]);


            $data = new Photo();
            $data->caption = $request->caption;



            if($request->hasFile('photo')){



                $ext = $request->file('photo')->extension();
                $final_name = time().'.'.$ext;
                $request->file('photo')->move(public_path('font_asset/uploads'),$final_name);
                $data->photo = $final_name;


              }

            $data->save();


            return redirect()->back()->with('success','Added Successfully');
        }
        public function photo_edit($id){

            $data = Photo::find($id);
         ;
            return view('admin.photo_edit',compact('data'));
        }

        public function photo_update(Request $request,$id){


            $request->validate([

                'post_photo' =>'mimes:png,jpg,jpeg,gif',
                'caption' => 'required'



            ]);


            $data = Photo::find($id);
            $data->caption = $request->caption;



            if($request->hasFile('photo')){


                unlink(public_path('font_asset/uploads/'.$data->photo));

                $ext = $request->file('photo')->extension();
                $final_name = time().'.'.$ext;
                $request->file('photo')->move(public_path('font_asset/uploads'),$final_name);
                $data->photo = $final_name;


              }


            $data->update();




            return redirect()->route('admin_photo_edit',$id)->with('success','Update Successfully');
        }
        public function photo_delete($id){
            $data = Photo::find($id);

            if($data->photo !=''){
                unlink(public_path('font_asset/uploads/'.$data->photo));
            }
            $data->delete();

            return redirect()->back()->with('success','Deleted Successfully');
        }

}
