<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(){
        $data = Page::where('id',1)->first();
        return view('font.contact',compact('data'));
    }
    public function send_email(Request $request){
        $validator = Validator::make($request->all(),[
                 'name' =>'required',
                 'email' =>'required|email',
                 'message' => 'required'
        ]);



        if($validator->fails()){
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }else{
           $admin_email['to'] = Admin::where('id',1)->first()->email;

            $data = ['name' => $request->name, 'visitor_email' => $request->email,'messages' => $request->message];

            Mail::send('font/email', $data, function ($message) use ($admin_email) {
                $message->to($admin_email['to'] );
                $message->subject('Contact Form Email');
            });

            return response()->json(['code'=>1,'success_message'=>'Email Is Sent!']);
        }
    }
}
