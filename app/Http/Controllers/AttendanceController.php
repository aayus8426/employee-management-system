<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;

class AttendanceController extends Controller
{
   

    public function index()
    {
        // Retrieve employees to populate the dropdown
        $employees = Employee::all();
        return view('attendance.index', compact('employees'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*' => 'in:present,absent',
        ]);

        // Retrieve the date from the request
        $date = $request->input('date');

        // Loop through the attendance data for each employee
        foreach ($request->input('attendance') as $employeeId => $status) {
            // Store the attendance record in the database
            Attendance::create([
                'employee_id' => $employeeId,
                'date' => $date,
                'status' => $status,
            ]);
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Attendance recorded successfully.');
    }

    public function show(Request $request)
    {
        // Get the selected date from the request
        $selectedDate = $request->input('date');
    
        // Fetch employees along with their attendance records for the selected date
        $employees = Employee::with(['attendances' => function ($query) use ($selectedDate) {
            $query->where('date', $selectedDate);
        }])->get();
    
        return view('attendance.view', compact('employees', 'selectedDate'));
    }
    
    // Pass data to the view

}
