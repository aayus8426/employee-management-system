<?php

namespace App\Http\Controllers;

use App\Models\LeaveSetting;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveSettingsController extends Controller
{
    public function index()
    {
        $settings = LeaveSetting::first();
        return view('setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'working_days_required' => 'required|integer',
            'leave_earned_per_period' => 'required|integer',
        ]);

        $settings = LeaveSetting::firstOrNew();
        $settings->working_days_required = $request->input('working_days_required');
        $settings->leave_earned_per_period = $request->input('leave_earned_per_period');
        $settings->save();

        return redirect()->route('settings.index')->with('success', 'Leave earning rules updated successfully.');
    }
      

    
}
