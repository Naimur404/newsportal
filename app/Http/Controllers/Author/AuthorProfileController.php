<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorProfileController extends Controller
{
    public function index(){
        return view('author.author_profile');
    }
    public function edit_profile_submit(Request $request){
      $request->validate([
         'email' => 'required|email',
         'name' => 'required'

      ]);
      $data = Author::where('email',Auth::guard('author')->user()->email)->first();
      $data->name = $request->name;
      $data->email = $request->email;
      if($request->password != ''){
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'

         ]);
         $data->password = Hash::make($request->password);
      }
      if($request->hasFile('photo')){
        $request->validate([
            'photo' => 'image|mimes:png,jpg,jpeg',


        ]);
    if($data->photo != NULL){
        unlink(public_path('admin_asset/uploads/'.$data->photo));
    }


        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('admin_asset/uploads'),$final_name);
        $data->photo = $final_name;


      }


      $data->update();
      return redirect()->back()->with('success','Profile Information Update Sucessfully');


    }
}
