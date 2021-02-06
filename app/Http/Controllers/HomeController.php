<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\view;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       //  return view('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'phone' => 'required',
           'role_id' => 'required',
           'photo' => 'sometimes|image',
           
       ]);
       $user = User::find($id);
       
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->phone = $request->input('phone');
       $user->role_id = $request->input('role_id');


    if($request->hasFile('photo'))
    {
        $file = public_path("uploads/images/{$user->photo}"); // get previous image from folder
        if (File::exists($file)) { // unlink or remove previous image from folder
            unlink($file);
        }
        $file = Input::file('photo');
        $name = time() . '-' . $file->getClientOriginalName();
        $file = $file->move(('uploads/images'), $name);
        $user->photo = $name;
    }
    $user->save();
        return redirect('/home');
        
    }

}
