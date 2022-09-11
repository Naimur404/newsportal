<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialItem;
use Illuminate\Http\Request;

class SocialItemController extends Controller
{
    public function show(){
        $social_data = SocialItem::get();
        return view('admin.social_items.social_items_show',compact('social_data'));

    }
    public function create(){
        return view('admin.social_items.social_items_create');
    }
    public function social_item_store(Request $request){
        $request->validate([
            'code' => 'required',
            'url' => 'required|url'



        ]);
        $data = new SocialItem();
        $data->icon = $request->code;
        $data->url = $request->url;




        $data->save();
        return redirect()->back()->with('success','Added Successfully');
    }

    public function social_item_edit($id){

        $data = SocialItem::find($id);
     ;
        return view('admin.social_items.social_items_edit',compact('data'));
    }

    public function social_item_update(Request $request,$id){


        $request->validate([
            'code' => 'required',
            'url' => 'required|url'



        ]);


        $data = SocialItem::find($id);
        $data->icon = $request->code;
        $data->url = $request->url;





        $data->update();




        return redirect()->route('admin_social_item_edit',$id)->with('success','Update Successfully');
    }
    public function social_item_delete($id){
        $data = SocialItem::find($id);


        $data->delete();

        return redirect()->back()->with('success','Deleted Successfully');
    }

}
