<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function poll_submit(Request $request,$id){
         $poll_data = OnlinePoll::where('id',$id)->first();
         if($request->vote == 'yes'){
           $updated_vote = $poll_data->yes_vote+1;
           $poll_data->yes_vote = $updated_vote;

         }elseif ($request->vote == 'no') {
            $updated_vote = $poll_data->no_vote+1;
            $poll_data->no_vote = $updated_vote;

         }else{
            $updated_vote = $poll_data->no_comment_vote+1;
            $poll_data->no_comment_vote = $updated_vote;

         }
         $poll_data->update();
         session()->put('poll_id',$id);
         return redirect()->back()->with('success','Vote is counted Successfully');

    }
    public function old_poll_result(){
        $datas = OnlinePoll::orderBy('id','desc')->take(4)->get();
        return view('font.old_poll_result',compact('datas'));
    }
}
