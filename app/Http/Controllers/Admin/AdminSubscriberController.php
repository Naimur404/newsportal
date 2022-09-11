<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminSubscriberController extends Controller
{
    public function show_all(){
        $datas = Subscriber::get();
        return view('admin.subscriber_show',compact('datas'));
    }
    public function send_email(){
        return view('admin.subricers_send_email');
    }
    public function send_email_submit(Request $request){


        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            


        ]);



                    $data = ['main_message'=>$request->message,'subject'=>$request->subject];
                     $subject = $request->subject;
                  
                   $subscriber =  Subscriber::where('status',1)->get();
                   foreach ($subscriber as $subs){
                    $user = $subs->email;
                    Mail::send('admin/email', $data, function ($message) use ($user,$subject) {
                        $message->to($user);
                        $message->subject($subject);
                    });
                    return redirect()->back()->with('success','Email Send Successfully');
      
    }
}
}
