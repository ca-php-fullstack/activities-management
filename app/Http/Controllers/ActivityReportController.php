<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserActivity;

class ActivityReportController extends Controller
{
    public function index(UserActivity $userActivity)
    {
        $userActivity = auth()->user()->userActivities->sortBy('activity_start_date');

        return view('profile.reports.index', compact('userActivity'));
    }

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
