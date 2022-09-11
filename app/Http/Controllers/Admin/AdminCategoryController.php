<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function create(){
    return view('admin.category_create');
    }
    public function show(){
    $category =  Category::orderBy('category_order','asc')->get();
    return view('admin.category_show',compact('category'));
    }
    public function category_store(Request $request){
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required'


        ]);
        $data = new Category();
        $data->category_name = $request->category_name;
        $data->show_on_menu = $request->show_on_menu;
        $data->is_home = $request->is_home;
        $data->category_order = $request->category_order;


        $data->save();
        return redirect()->route('admin_category_show')->with('success','Added Successfully');
    }
    public function category_edit($id){
        $data = Category::find($id);
        return view('admin.category_update',compact('data'));
    }
    public function category_update(Request $request,$id){
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required'


        ]);
        $data = Category::find($id);
        $data->category_name = $request->category_name;
        $data->show_on_menu = $request->show_on_menu;
        $data->is_home = $request->is_home;
        $data->category_order = $request->category_order;


        $data->update();
        return redirect()->back()->with('success','Update Successfully');
    }
    public function category_delete($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }

    }

