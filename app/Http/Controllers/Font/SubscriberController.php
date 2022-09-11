<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function index(Request $request){
        $validator = Validator::make($request->all(),[

            'email' =>'required|email',

   ]);



   if($validator->fails()){
       return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
   }else{
     $token = rand(11111111, 9999999);
     $main_data = new Subscriber();
     $main_data->email = $request->email;
     $main_data->token = $token;
     $main_data->status = 0;
     $main_data->save();

        $user['to'] = $request->email;

        $link =  '<a href="'.route('subscriber_verify',$token).'" class="btn btn-primary">Click Here</a>';
        $data = ['tink' => $link,'title'=>'Verify','title2' => 'Please Verify your email'];

        Mail::send('font/subscriber_email', $data, function ($message) use ($user) {
            $message->to($user['to'] );
            $message->subject('Subscriber Email Verify');
        });
        return response()->json(['code'=>1,'success_message'=>'Email Is Sent For Verify!']);

   }
}
public function verify($token){
   $data = Subscriber::where('token',$token)->first();
   if($data){
       $data->token = '';
       $data->status = 1;
       $data->update();
       return redirect()->back()->with('sucess','Your are successfully verified as a subscriber to this system');
   }else{

    return redirect()->route('home')->with('error','Verification failed.. Please Try Again');
   }


}
}
