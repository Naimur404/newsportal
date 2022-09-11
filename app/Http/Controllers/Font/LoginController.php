<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Author;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index(){
        $data = Page::where('id',1)->first();
        return view('font.login',compact('data'));
    }
    public function login(Request $request){
        $request->validate([
         'email' => 'required|email',
         'password' => 'required'
        ]);
        $credentail = [
           'email' => $request->email,
           'password' => $request->password
        ];
        if(Auth::guard('author')->attempt($credentail)){
          return redirect()->route('author_home');
        }else{
        return redirect()->route('author_login')->with('error','Information is not correct');

        }


  }
  public function auhtor_logout(){
    Auth::guard('author')->logout();
    return redirect()->route('home');
}


public function forget_password(){
    return view('author.forget_password');
}
public function forget_pass_submit(Request $request){
    $request->validate([
        'email' => 'required|email',

       ]);
    $check = Author::where('email',$request->email)->first();
    if(!$check){
        return redirect()->back()->with('error','This email does not exist');
    }
    $token = Hash('sha256',time());
    $check->token = $token;
    $check->update();
    $resetlink= url('/author/reset_password/'.$token.'/'.$request->email);
    $subject = 'Reset Password';
    $text = 'Reset Passoword';
    $messaage = view('email.emailcontent',compact('resetlink','text'));
    Mail::to($request->email)->send(new Websitemail($subject, $messaage));
    return redirect()->route('author_login')->with('success','Please check Your email and follow the steps there');

}



public function reset_password($token,$email){
   $admin_data=  Author::where('token',$token)->where('email',$email)->first();
   if(!$admin_data){
           return redirect()->route('author_login')->with('error','No Author Found');
   }
   return view('author.reset_password',compact('token','email'));

}
public function reset_password_submit(Request $request){
    $request->validate([
        'password' => 'required',
        'retype_password' => 'required|same:password',
     ]);

    $admin_data = Author::where('token',$request->token)->where('email',$request->email)->first();
    $admin_data->password = Hash::make($request->password);
    $admin_data->token = '';
    $admin_data->update();

     return redirect()->route('author_login')->with('success','Password Update Sucessfully Please login');
}



}
