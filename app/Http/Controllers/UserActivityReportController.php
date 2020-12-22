<?php

namespace App\Http\Controllers;

use App\User;
use App\UserActivity;
use App\UserActivityReport;
use Illuminate\Http\Request;

class UserActivityReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserActivity $userActivity)
    {
        $userActivity = auth()->user()->userActivities->sortBy('activity_start_date');

        return view('profile.reports.index', compact('userActivity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportShow()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserActivityReport  $userActivityReport
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        if (isset($dateFrom) && isset($dateTo)) {
            
            $userActivity = auth()->user()->userActivities
            ->sortBy('activity_start_date')
            ->where('activity_start_date', '>=', $dateFrom)
            ->where('activity_end_date', '<=', $dateTo);

            return view('profile.reports.index', compact('userActivity'));

        }else {
            
            return redirect()->back()->with('error', 'Date Not Selected');
        } 
    }
}