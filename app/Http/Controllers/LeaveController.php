<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveApplication;

class LeaveController extends Controller
{
    public function index()
    {
        // Fetch leave applications for the current user
        $leaveApplications = auth()->user()->leaveApplications()->latest()->get();
        
        return view('leave.index', compact('leaveApplications'));
    }

    public function apply(Request $request)
    {
        // Validate leave application data
        $validatedData = $request->validate([
            'leave_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required',
        ]);

        // Create a new leave application
        $leaveApplication = new LeaveApplication();
        $leaveApplication->employee_id = auth()->id();
        $leaveApplication->leave_type = $validatedData['leave_type'];
        $leaveApplication->start_date = $validatedData['start_date'];
        $leaveApplication->end_date = $validatedData['end_date'];
        $leaveApplication->reason = $validatedData['reason'];
        $leaveApplication->status = 'pending';
        $leaveApplication->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Leave application submitted successfully.');
    }
    public function approve(LeaveApplication $leaveApplication)
    {
        $leaveApplication->status = 'approved';
        $leaveApplication->save();
        return redirect()->back()->with('success', 'Leave request approved successfully.');
    }

    public function reject(LeaveApplication $leaveApplication)
    {
        $leaveApplication->status = 'rejected';
        $leaveApplication->save();
        return redirect()->back()->with('success', 'Leave request rejected.');
    }
    public function pendingLeave()
    {
        $leaveApplications = LeaveApplication::where('status', 'pending')->get();
        return view('leave.pending', compact('leaveApplications'));
    }

}
