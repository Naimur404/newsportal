<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;

class AdminOnlinePollController extends Controller
{
    public function show(){
        $online_poll_data = OnlinePoll::get();
        return view('admin.online_poll.online_poll_show',compact('online_poll_data'));

    }
    public function create(){
        return view('admin.online_poll.oinline_poll_add');
    }
    public function online_poll_store(Request $request){
        $request->validate([
            'poll' => 'required',



        ]);
        $data = new OnlinePoll();
        $data->poll = $request->poll;
        $data->yes_vote = 0;
        $data->no_vote = 0;
        $data->no_comment_vote = 0;



        $data->save();
        return redirect()->back()->with('success','Added Successfully');
    }

    public function online_poll_edit($id){

        $data = OnlinePoll::find($id);
     ;
        return view('admin.online_poll.online_poll_edit',compact('data'));
    }

    public function online_poll_update(Request $request,$id){


        $request->validate([
            'poll' => 'required',



        ]);


        $data = OnlinePoll::find($id);
        $data->poll = $request->poll;





        $data->update();




        return redirect()->route('admin_online_poll_edit',$id)->with('success','Update Successfully');
    }
    public function online_poll_delete($id){
        $data = OnlinePoll::find($id);


        $data->delete();

        return redirect()->back()->with('success','Deleted Successfully');
    }



}
