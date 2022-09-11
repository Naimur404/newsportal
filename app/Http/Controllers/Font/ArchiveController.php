<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function archive_post(Request $request){
              $date = explode('-',$request->archive_data);
              $month = $date[0];
              $year = $date[1];
              return redirect()->route('archive_post_all',[$month,$year]);
    }

    public function archive_post_all($month,$year){
        $post_data = Post::with('subCategory')->whereMonth('created_at','=',$month)->whereYear('created_at','=',$year)->paginate(10);
        foreach($post_data as $data){
          $ts =  strtotime($data->created_at);
          $final_date = date('F, Y',$ts);
          break;
        }
        return view('font.archive_post',compact('post_data','final_date'));
}
    }

