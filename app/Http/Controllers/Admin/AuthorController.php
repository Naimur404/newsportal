<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthorController extends Controller
{
    public function create(){
        return view('admin.author.author_create');
        }
        public function show(){
        $data =  Author::orderBy('id','asc')->get();
        return view('admin.author.author_show',compact('data'));
        }
        public function author_store(Request $request){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:authors',
                'password' => 'required',
                'retype_password' => 'required|same:password'



            ]);
            $data = new Author();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->token = '';
            if($request->hasFile('photo')){
                $request->validate([
                    'photo' => 'image|mimes:png,jpg,jpeg,webp',


                ]);

                $ext = $request->file('photo')->extension();
                $final_name = time().'.'.$ext;
                $request->file('photo')->move(public_path('admin_asset/uploads'),$final_name);
                $data->photo = $final_name;


              }
             $data->save();

             $user['to'] = $request->email;

              $link = route('author_login');
              $about = route('about');
              $contact = route('contact');
              $home = route('home');
              $password = $request->password;
             $data = ['tink' => $link,'name' => $request->name,'about_us' =>$about, 'contact'=>$contact,'home' =>$home,'password' => $password];

             Mail::send('admin/author/author_mail', $data, function ($message) use ($user) {
                 $message->to($user['to'] );
                 $message->subject('Author Account Created');
             });

            return redirect()->route('admin_author_show')->with('success','Added Successfully And Email Sent');
        }
        public function author_edit($id){

            $data = Author::find($id);
         ;
            return view('admin.author.author_edit',compact('data'));
        }

        public function author_update(Request $request,$id){

            $request->validate([
                'email' => 'required|email',
                'name' => 'required'

             ]);
             $data = Author::where('id',$id)->first();
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
               unlink(public_path('admin_asset/uploads/'.$data->photo));
               $ext = $request->file('photo')->extension();
               $final_name = time().'.'.$ext;
               $request->file('photo')->move(public_path('admin_asset/uploads'),$final_name);
               $data->photo = $final_name;


             }


             $data->update();
             return redirect()->route('admin_author_edit',$id)->with('success','Profile Information Update Sucessfully');

        }
        public function author_delete($id){
            $data = Author::find($id);

            if($data->photo !=NULL){
                unlink(public_path('admin_asset/uploads/'.$data->photo));
            }
            $data->delete();

            return redirect()->back()->with('success','Deleted Successfully');
        }
}
