<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Admin
    public function AdminHome()
    {
        $totalEmployee = count(Employee::all());
        $totalDepartment = count(Department::all());
        $totalLeave = count(Leave::where('status','!=','0')->get());
        $totalPendingLeave = count(Leave::where('status','0')->get());
        $employees = Employee::paginate(5);
        return view('admin.home',compact('employees','totalEmployee','totalDepartment','totalLeave','totalPendingLeave'));
    }

    //User
    public function UserHome()
    {
        $employee_id = Auth::user()->employee->id;
        $waitingLeave = DB::table('leaves')->where('status', '0')->where('employee_id', $employee_id)->get();
        $myLeaves = DB::table('leaves')->where('status','!=','0')->where('employee_id', $employee_id)->get();
        $leaveApproved = DB::table('leaves')->where('status','1')
                            ->where('softdelete','!=','1')
                            ->where('employee_id', $employee_id)->get();
        $leaveRejected = DB::table('leaves')->where('status','-1')
                            ->where('softdelete','!=','1')
                            ->where('employee_id', $employee_id)->get();

        return view('user.home',compact('waitingLeave','myLeaves','leaveApproved','leaveRejected'));
    }


}