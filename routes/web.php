<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/admin', function () {
//     return view('attendance.index');
// })->middleware('role:super_admin');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/employees', [EmployeeController::class, 'getEmployee']);
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'addEmployee'])->name('employees.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('/attendance', [AttendanceController::class, 'index'])
//     ->middleware('role:super_admin');
 
//     Route::post('/attendance', [AttendanceController::class, 'store'])->middleware('role:super_admin');
 


    Route::middleware(['auth', 'role:super_admin'])->group(function () {
        Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');

        Route::get('/attendance/show', [AttendanceController::class, 'show'])->name('attendance.show');

    });
    
    Route::get('/leave', [LeaveController::class, 'index'])->name('leave.index');
Route::post('/leave', [LeaveController::class, 'apply'])->name('leave.apply');
// Route for HR Admin to view pending leave requests
Route::get('/leave/pending', [LeaveController::class, 'pendingLeave'])->name('leave.pending');

// Route for HR Admin to approve a leave request
Route::put('/leave/{leaveApplication}/approve', [LeaveController::class, 'approve'])->name('leave.approve');

// Route for HR Admin to reject a leave request
Route::put('/leave/{leaveApplication}/reject', [LeaveController::class, 'reject'])->name('leave.reject');
require __DIR__.'/auth.php';
