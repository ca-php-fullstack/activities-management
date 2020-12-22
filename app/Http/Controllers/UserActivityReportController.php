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
    public function index()
    {
        return view('profile.reports.index');
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

            return view('profile.reports.show', compact('userActivity'));

        }else {
            
            return redirect()->back()->with('error', 'Date Not Selected');
        } 
    }
}