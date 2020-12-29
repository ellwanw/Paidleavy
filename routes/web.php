<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PositionController;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
        
            return view('auth.login');
        
})->middleware('login');



Auth::routes();

Route::group(['middleware' => ['is_admin']], function () {

Route::patch('admin/changePassword/{employee}', [EmployeeController::class, 'changePassword1'])->name('admin.changePassword');
Route::get('/admin/employee/cari','EmployeeController@cari');
Route::get('/admin/filterDate','LeaveController@filterDate');
//--Print
Route::get('admin/leaveListPrint','LeaveController@createPDF')->name('leave.pdf.print');
//--Admin
Route::get('admin/home', [HomeController::class, 'AdminHome'])->name('admin.home');
//--Admin Employee
Route::post('admin/employee}', [EmployeeController::class, 'store']);
Route::get('admin/employee', [EmployeeController::class, 'index'])->name('admin.employee.index');
Route::get('admin/employee/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
Route::delete('admin/employee/{employee}' , [EmployeeController::class, 'destroy']);
Route::get('admin/employee/{employee}', [EmployeeController::class, 'show'])->name('admin.employee.show');
Route::get('admin/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
Route::patch('admin/employee/{employee}', [EmployeeController::class, 'update']);
//--Admin Deparment
Route::post('admin/department}', [DepartmentController::class, 'store']);
Route::get('admin/department', [DepartmentController::class, 'index'])->name('admin.department.index');
Route::get('admin/department/create', [DepartmentController::class, 'create'])->name('admin.department.create');
Route::delete('admin/department/{department}' , [DepartmentController::class, 'destroy']);
Route::get('admin/department/{department}/edit', [DepartmentController::class, 'edit'])->name('admin.department.edit');
Route::patch('admin/department/{department}', [DepartmentController::class, 'update']);
//-Admin Position
Route::post('admin/position}', [PositionController::class, 'store']);
Route::get('admin/position', [PositionController::class, 'index'])->name('admin.position.index');
Route::get('admin/position/create', [PositionController::class, 'create'])->name('admin.position.create');
Route::delete('admin/position/{position}' , [PositionController::class, 'destroy']);
Route::get('admin/position/{position}/edit', [PositionController::class, 'edit'])->name('admin.position.edit');
Route::patch('admin/position/{position}', [PositionController::class, 'update']);
//-Admin Leave
Route::get('admin/leaveList', [LeaveController::class, 'index'])->name('admin.leaveList.index');
Route::get('user/leaveList/print', [LeaveController::class, 'print'])->name('admin.leaveList.print');
Route::get('admin/pendingLeave', [LeaveController::class, 'pendingIndex'])->name('admin.pendingLeave.index');
Route::get('admin/pendingLeave/{leave}/edit', [LeaveController::class, 'editPending'])->name('admin.pendingLeave.edit');
Route::patch('admin/pendingLeave/{leave}', [LeaveController::class, 'updatePending']);
});


Route::group(['middleware' => ['is_user']], function () {
 //--User
Route::patch('user/changePassword/{employee}', [EmployeeController::class, 'changePassword2'])->name('user.changePassword');
Route::get('user/home', [HomeController::class, 'UserHome'])->name('user.home');
//--User Leave
Route::post('user/leave}', [LeaveController::class, 'store']);
Route::get('user/leave', [LeaveController::class, 'index'])->name('user.leave.index');
Route::get('user/leave/create', [LeaveController::class, 'create'])->name('user.leave.create');
Route::delete('user/leave/{leave}' , [LeaveController::class, 'cancel']);
Route::get('user/leave/{leave}', [LeaveController::class, 'show'])->name('user.leave.show');
Route::get('user/leave/{leave}/edit', [LeaveController::class, 'edit'])->name('user.leave.edit');
Route::patch('user/leave/{leave}', [LeaveController::class, 'update']);
//-User Approved Leave
Route::get('user/approvedLeave', [LeaveController::class, 'approvedIndex'])->name('user.approvedLeave.index');
//-User Rejected Leave
Route::get('user/rejectedLeave', [LeaveController::class, 'rejectedIndex'])->name('user.rejectedLeave.index');
Route::patch('/softDelete/{leave}', [LeaveController::class, 'softDelete']);
//-User History Leave
Route::get('user/historyLeave', [LeaveController::class, 'historyIndex'])->name('user.historyLeave.index');
});



