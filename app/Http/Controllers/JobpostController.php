<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Validator;

use App\Jobpost;
use App\User;
use App\Apply;

class JobpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $jobpost = User::findOrFail($user_id);
        return view('useractivity')->with('jobpost',$jobpost->jobpost);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            
        ]);

         $jobpost = new Jobpost;
         $jobpost->user_id = $request->input('user_id');
         $jobpost->name = $request->input('name');
         $jobpost->email = $request->input('email');
         $jobpost->phone = $request->input('phone');
         $jobpost->title = $request->input('title');
         $jobpost->description = $request->input('description');
         $jobpost->address = $request->input('address');
         $jobpost->save();
         return redirect('/useractivity')->with('success','Job Posted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobpost = Jobpost::findOrFail($id);
       
        return view('users.edituserpost')->with('jobpost', $jobpost);
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
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            
        ]);

         $jobpost = Jobpost::findOrFail($id);
         $jobpost->user_id= $request->input('user_id');
         $jobpost->name = $request->input('name');
         $jobpost->email = $request->input('email');
         $jobpost->phone = $request->input('phone');
         $jobpost->title = $request->input('title');
         $jobpost->description = $request->input('description');
         $jobpost->address = $request->input('address');
         $jobpost->save();
         return redirect('/useractivity')->with('success','Job Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobpost = Jobpost::findOrFail($id);
        $jobpost->delete();
        return redirect('/useractivity')->with('error', 'Job Post Removed Successfully');
    }

    public function indexCleaner()
    {
        $jobpost = Jobpost::orderBy('created_at','desc')->simplePaginate(7);
        print view('cleanerpage.cleaner')->with('jobpost',$jobpost);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cleanerJobDetail($id)
    {
        $jobpost = Jobpost::findOrFail($id);
        return view('cleanerpage.detail')->with('jobpost', $jobpost);
    }

    //applying for job

    public function application(Request $request)
    {
        $this->validate($request,[

            'location' => 'required',
            
            
        ]);

         $apply = new Apply;
         $apply->cleaner_id = $request->input('cleaner_id');
         $apply->jobpost_id = $request->input('jobpost_id');
         $apply->user_id = $request->input('user_id');
         $apply->name = $request->input('name');
         $apply->email = $request->input('email');
         $apply->phone = $request->input('phone');
         $apply->location = $request->input('location');
         $apply->jobpost_name = $request->input('jobpost_name');
         $apply->jobpost_phone = $request->input('jobpost_phone');
         $apply->jobpost_email = $request->input('jobpost_email');
         $apply->jobpost_address = $request->input('jobpost_address');
         $apply->save();
         return redirect('/cleanerjobs')->with('success','Job Applied  Successfully');

    }


    // view job request

    public function viewJob(){
        $user_id = auth()->user()->id;
        $viewrequest = User::find($user_id)->applies->where('approve', '=', 0);
       //dd($viewrequest);
        return view('users.viewrequestjob')->with('viewrequest', $viewrequest);
    }
    // approve jobs
    public function approve(Request $request,$id){

        $approve = Apply::findOrFail($id);
        $approve->approve = $request->input('approve');
        $approve->save();
        return redirect('/viewrequest')->with('success','Approval Successful');

    }
    
    //disappprovejobs
    public function disapprove(Request $request,$id){

        $disapprove = Apply::findOrFail($id);
        $disapprove->approve = $request->input('disapprove');
        $disapprove->save();
        return redirect('/viewrequest')->with('error','Approval Cancelled');

    }

    // approved jobs view
    public function approvedJobs(){
        $user_id = auth()->user()->id;
        $viewjobs = Apply::all()->where('approve','=',1)->where('cleaner_id', '=', $user_id);
        //$viewjobs = Apply::all()->where('approve',1);
        //$viewjobs->where('approve', 1);
            //dd ($viewjobs);
            
       return view('cleanerpage.approvedjobs')->with('viewjobs', $viewjobs);
       
    }
    

}
