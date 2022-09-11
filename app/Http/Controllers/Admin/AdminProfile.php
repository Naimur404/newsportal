<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfile extends Controller
{
    public function index(){
        return view('admin.admin_profile');
    }
    public function edit_profile_submit(Request $request){
      $request->validate([
         'email' => 'required|email',
         'name' => 'required'

      ]);
      $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();
      $admin_data->name = $request->name;
      $admin_data->email = $request->email;
      if($request->password != ''){
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'

         ]);
         $admin_data->password = Hash::make($request->password);
      }
      if($request->hasFile('photo')){
        $request->validate([
            'photo' => 'image|mimes:png,jpg,jpeg',


        ]);
        unlink(public_path('admin_asset/uploads/'.$admin_data->photo));
        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('admin_asset/uploads'),$final_name);
        $admin_data->photo = $final_name;


      }


      $admin_data->update();
      return redirect()->back()->with('success','Profile Information Update Sucessfully');


    }
}
