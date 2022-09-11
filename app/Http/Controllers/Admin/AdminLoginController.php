<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{
    public function index(){

        return view('admin.admin_login');

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
          if(Auth::guard('admin')->attempt($credentail)){
            return redirect()->route('admin.dashboard');
          }else{
          return redirect()->route('admin.login')->with('error','Information is not correct');

          }


    }
    public function forget_password(){
        return view('admin.forget_password');
    }
    public function forget_pass_submit(Request $request){
        $request->validate([
            'email' => 'required|email',

           ]);
        $check = Admin::where('email',$request->email)->first();
        if(!$check){
            return redirect()->back()->with('error','This email does not exist');
        }
        $token = Hash('sha256',time());
        $check->token = $token;
        $check->update();
        $resetlink= url('/admin/reset_password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $text = 'Reset Passoword';
        $messaage = view('email.emailcontent',compact('resetlink','text'));
        Mail::to($request->email)->send(new Websitemail($subject, $messaage));
        return redirect()->route('admin.login')->with('success','Please check Your email and follow the steps there');

    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function reset_password($token,$email){
       $admin_data=  Admin::where('token',$token)->where('email',$email)->first();
       if(!$admin_data){
               return redirect()->route('admin.login');
       }
       return view('admin.reset_passowrd',compact('token','email'));

    }
    public function reset_password_submit(Request $request){
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
         ]);

        $admin_data = Admin::where('token',$request->token)->where('email',$request->email)->first();
        $admin_data->password = Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();

         return redirect()->route('admin.login')->with('success','Password Update Sucessfully Please login');
    }
}
