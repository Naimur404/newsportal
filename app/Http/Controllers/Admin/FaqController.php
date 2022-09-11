<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function create(){
        return view('admin.faq_create');
        }
        public function show(){
        $data =  Faq::orderBy('id','asc')->get();
        return view('admin.faq_show',compact('data'));
        }
        public function faq_store(Request $request){
            $request->validate([
                'faq_title' => 'required',
                'faq_detail' => 'required'


            ]);
            $data = new Faq();
            $data->faq_title = $request->faq_title;
            $data->faq_detail = $request->faq_detail;



            $data->save();
            return redirect()->route('admin_faq_show')->with('success','Added Successfully');
        }
        public function faq_edit($id){
            $data = Faq::find($id);
            return view('admin.faq_update',compact('data'));
        }
        public function faq_update(Request $request,$id){
            $request->validate([
                'faq_title' => 'required',
                'faq_detail' => 'required'


            ]);
            $data = Faq::find($id);
            $data->faq_title = $request->faq_title;
            $data->faq_detail = $request->faq_detail;


            $data->update();
            return redirect()->back()->with('success','Update Successfully');
        }
        public function faq_delete($id){
            $data = Faq::find($id);
            $data->delete();
            return redirect()->back()->with('success','Delete Successfully');
        }
}
