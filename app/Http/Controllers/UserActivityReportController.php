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
        //$userActivity = auth()->user()->userActivities->sortBy('activity_start_date');
        
        $userId = Auth::id(); 
        // is this single Activity or Many Activities? it should be $userActivities
        $userActivity = UserActivity::where('user_id', $userId)->sortBy('activity_start_date')->get();

        return view('profile.reports.index', compact('userActivity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // THIS FUNCTION DOES NOT CREATE ANYTHING WHy YOU CALLED IT reportCreate ????
    public function reportCreate(Request $request)
    {
        $dateFrom =  request('date_from');
        $dateTo = request('date_to');        
        $userId = Auth::id(); 
//         if (isset($dateFrom) && isset($dateTo)) { <---- we dont need isset here, request() will return null if parameter not set and $dateFrom will be null,
        // but will be set anyway
        if ( $dateFrom && $dateTo ) {

            // Pagination? 
            $userActivity = UserActivity::where('user_id', $userId)
            ->whereDate('activity_start_date', '>=', $dateFrom) // date should be format  2020-01-31
            ->whereDate('activity_end_date', '<=', $dateTo)
            ->sortBy('activity_start_date') // we put sorting and grouping at the end of query usually
            ->get();

            return view('profile.reports.create', compact('userActivity'));

        }else {
            return redirect()->back()->with('error', 'No Date Selected');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ADD correct validation
//         $request->validate([
//             'activity_name_report',
//             'activity_start_date_report',
//             'activity_end_date_report',
//             'activity_duration_report', 
//             'activity_description_report'
                       
//         ]);

        
        // why you need this long Database fields?
        UserActivity::create([
            'activity_name_report' => $request->activity_name_report,
            'activity_start_date_report' => $request->activity_start_date_report,
            'activity_end_date_report' => $request->activity_end_date_report,
            'activity_duration_report' => $request->activity_duration_report,
            'activity_description_report' => $request->activity_description_report
            
       ]);

        // consider just redirect redirect()->back()->with('message', 'Report Send Successfully');
       return redirect(route('profile'))->with('message', 'Report Send Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserActivityReport  $userActivityReport
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }
}
