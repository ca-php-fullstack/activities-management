<?php

namespace App\Http\Controllers;

use App\UserActivity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserActivityController extends Controller
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

    public function index(UserActivity $userActivity)
    {
        $userActivity = auth()->user()->userActivities->sortBy('activity_start_date');
     
        return view('profile.activities.index', compact('userActivity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_name' => 'required',
            'activity_start_date' => 'required',
            'activity_end_date'=> 'required',
            'activity_description' => 'required',            
        ]);

        $startTime = Carbon::parse($request->activity_start_date);
        $endTime = Carbon::parse($request->activity_end_date);
        $totalDuration =  $startTime->diff($endTime)->format('%H:%I:%S');
    
        auth()->user()->userActivities()->create([
            'activity_name' => $request->activity_name,
            'activity_start_date' =>$request->activity_start_date,
            'activity_end_date' =>$request->activity_end_date,
            'activity_description' => $request->activity_description,
            'activity_duration' => $totalDuration
        ]);

        return redirect(route('activities'))->with('message', 'Activity Created Successfully');
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(UserActivity $userActivity)
    {
        
        return view('profile.activities.edit', compact('userActivity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserActivity $userActivity)
    {
        $request->validate([
            
            'activity_name' => 'required',
            'activity_start_date' => 'required',
            'activity_end_date' => 'required',
            'activity_description' => 'required',
            
            
        ]);

        $startTime = Carbon::parse($request->activity_start_date);
        $endTime = Carbon::parse($request->activity_end_date);
        $totalDuration =  $startTime->diff($endTime)->format('%H:%I:%S');

        $userActivity->update([
            'activity_name' =>$request->activity_name,
            'activity_start_date' =>$request->activity_start_date,
            'activity_end_date' =>$request->activity_end_date,
            'activity_description' =>$request->activity_description,
            'activity_duration' => $totalDuration
        ]);

        return redirect(route('activities'))->with('message', 'Activity Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserActivity $userActivity)
    {
        $userActivity->delete();
        
        return redirect(route('profile'))->with('message', 'Activity Deleted Successfully');
    }
}
