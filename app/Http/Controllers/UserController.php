<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
       
        return view('cleaner')->with('user',$user);
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
           'photo' => 'required',
           
       ]);
       if($request->hasfile('photo'))
        {
           $file = $request->file('photo');
           $name=time().$file->getClientOriginalName();
           $file->move(public_path().'/img/', $name);
        }

        $user = new App\User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('photo');
        $user->role_id = $request->input('role_id');
        $user-> Hash::make($request['password']);
        if($request->hasfile('photo')){
            $user->photo = $name;
        }
        $user->save();
        return redirect('/home');
        
    }

}
