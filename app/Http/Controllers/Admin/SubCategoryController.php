<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function show(){
        $sub_category =  SubCategory::with('rCategory')->orderBy('sub_category_order','asc')->get();
        return view('admin.sub_category_show',compact('sub_category'));
        }
        public function create(){
            $category = Category::get();
            return view('admin.sub_category_create',compact('category'));
            }
            public function sub_category_store(Request $request){
                $request->validate([
                    'sub_category_name' => 'required',
                    'sub_category_order' => 'required',
                    'category_id' => 'required'


                ]);
                $data = new SubCategory();
                $data->sub_category_name = $request->sub_category_name;
                $data->sub_category_order = $request->sub_category_order;
                $data->category_id= $request->category_id;
                $data->show_on_menu = $request->show_on_menu;
                $data->show_on_home = $request->show_on_home;



                $data->save();
                return redirect()->route('admin_sub_category_show')->with('success','Added Successfully');
            }
            public function sub_category_edit($id){

                $sub_cat_data = SubCategory::find($id);
                $category = Category::get();
                return view('admin.sub_category_edit',compact('sub_cat_data','category'));
            }
            public function sub_category_update(Request $request,$id){
                $request->validate([
                    'sub_category_name' => 'required',
                    'sub_category_order' => 'required',
                    'category_id' => 'required'


                ]);
                $data = SubCategory::find($id);
                $data->sub_category_name = $request->sub_category_name;
                $data->sub_category_order = $request->sub_category_order;
                $data->category_id= $request->category_id;
                $data->show_on_menu = $request->show_on_menu;
                $data->show_on_home = $request->show_on_home;


                $data->update();
                return redirect()->back()->with('success','Update Successfully');
            }
            public function sub_category_delete($id){
                $data = SubCategory::find($id);
                $data->delete();
                return redirect()->back()->with('success','Delete Successfully');
            }
}
