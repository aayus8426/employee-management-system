<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveSettingsController;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('login');
// });
// Route::get('/admin', function () {
//     return view('attendance.index');
// })->middleware('role:super_admin');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/leave', [LeaveController::class, 'index'])->name('leave.index');
    Route::post('/leave', [LeaveController::class, 'apply'])->name('leave.apply');
    Route::get('myleave',[LeaveController::class,'myleave'])->name('leave.myleave');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/leave/pending', [LeaveController::class, 'pendingLeave'])->name('leave.pending');
    Route::put('/leave/{leaveApplication}/approve', [LeaveController::class, 'approve'])->name('leave.approve');
    Route::put('/leave/{leaveApplication}/reject', [LeaveController::class, 'reject'])->name('leave.reject');
    Route::get('/settings', [LeaveSettingsController::class,'index'])->name('settings.index');
Route::put('/settings', [LeaveSettingsController::class,'update'])->name('settings.update');
Route::get('/employees', [EmployeeController::class, 'getEmployee']);
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'addEmployee'])->name('employees.store');
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/attendance/show', [AttendanceController::class, 'show'])->name('attendance.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {


});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('/attendance', [AttendanceController::class, 'index'])
//     ->middleware('role:super_admin');

//     Route::post('/attendance', [AttendanceController::class, 'store'])->middleware('role:super_admin');

Route::get('/employee/leaves', [EmployeeController::class, 'viewLeaves'])->name('employee.leaves');




Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');



require __DIR__ . '/auth.php';
