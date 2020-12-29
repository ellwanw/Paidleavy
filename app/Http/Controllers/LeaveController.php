<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    public function createPDF(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $leaves = Leave::whereBetween('start_date',[$start_date,$end_date])->get();
        $pdf = PDF::loadView('admin.leaveList.printPage', compact('leaves'))->setPaper('A4','landscape');
        return $pdf->stream();
    }

    public function filterDate(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        if(!$request->month && !$request->month){
            $leaves = Leave::where('status','!=','0')->paginate(5);   
        }
        elseif(!$request->month){
            $leaves = Leave::WhereYear('start_date',$year)->paginate(5);
        }elseif(!$request->year){
            $leaves = Leave::WhereMonth('start_date',$month)->paginate(5);
        }else{
            $leaves = Leave::WhereYear('start_date',$year)->WhereMonth('start_date',$month)->paginate(5);
        }

        return view('admin.leaveList.index',compact('leaves'));
    }

    public function print() 
    {
        return view('admin.leaveList.print');
    }
    public function index()
    {
        $leaves = Leave::where('status','!=','0')->paginate(5);
        return view('admin.leaveList.index',compact('leaves'));
    }
    public function pendingIndex()
    {
        $leaves = Leave::where('status','0')->paginate(5);
        return view('admin.pendingLeave.index',compact('leaves'));
    }
    public function approvedIndex()
    {
        $employee_id = Auth::user()->employee->id;
        $leaves = Leave::where('status','1')->where('softdelete','!=','1')->where('employee_id',$employee_id)->paginate(5);
        return view('user.approvedLeave.index',compact('leaves'));
    }
    public function rejectedIndex()
    {
        $employee_id = Auth::user()->employee->id;

        $leaves = Leave::where('status','-1')->where('employee_id',$employee_id)->where('softdelete','!=','1')->paginate(5);
        return view('user.rejectedLeave.index',compact('leaves'));
    }
    public function historyIndex()
    {
        $employee_id = Auth::user()->employee->id;
        $leaves = Leave::where('status','!=','0')->where('employee_id',$employee_id)->paginate(5);
        return view('user.historyLeave.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Leave::all();
        return view('user.leave.create',compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'type_of_leave' => 'required',
            'description' => 'required',
            'leave_amount' => 'required|numeric',
            'start_date' => 'required|date',
            'phone' => 'required|digits_between:9,13',
        ]);

        $id = Auth::user()->employee->id;
        $myApproval = DB::table('leaves')->where('status','=','0')->where('employee_id','=',$id)->get();
        $waitingList = count($myApproval);

        if($waitingList == 1){
            alert()->warning('Ooops','There is still a pending approval!');

            return redirect('user/home');
        }
                $input = $request->all();
                    $date = $input['start_date'];
                    $date1 = str_replace('-', '/', $date);
                    $day = $input['leave_amount'];
                    $end_date = date('Y-m-d',strtotime( $date1."+ $day days - 1 days"));
                    $input['end_date'] = $end_date;
        Leave::create($input);
            alert()->success('Success','Approval have been sent!');

            return redirect('user/home');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        return view('user.leave.edit',compact('leave'));
    }
    public function editPending(Leave $leave)
    {
        return view('admin.pendingLeave.edit',compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        request()->validate([
            'type_of_leave' => 'required',
            'description' => 'required',
            'leave_amount' => 'required|numeric',
            'start_date' => 'required|date',
            'phone' => 'required|digits_between:9,13',
        ]);

        $date = $request['start_date'];
            $date1 = str_replace('-', '/', $date);
            $day = $request['leave_amount'];
            $end_date = date('Y-m-d',strtotime( $date1."+ $day days - 1 days"));
            $request['end_date'] = $end_date;

        Leave::where('id',$leave->id)->update([
            'type_of_leave' => $request->type_of_leave,
            'description' => $request->description,
            'leave_amount' => $request->leave_amount,
            'phone' => $request->phone,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return redirect('user/home')->withSuccess('Leave have been updated!');

    }

    public function softDelete(Request $request, Leave $leave)
    {

        Leave::where('id',$leave->id)->update([
            'softdelete' => '1',
        ]);
        return redirect('user/rejectedLeave')->withSuccess('Leave have been removed!');

    }

    public function updatePending(Request $request, Leave $leave){

        request()->validate([
            'approver' => 'required',
        ]);

        Leave::where('id',$leave->id)->update([
            'approver' => $request->approver,
            'approved_date' => date('Y-m-d'),
            'status' => $request->status,
            ]);

        if($request->status == 1){
            $leave->employee->update([
                'leave_balance' => $leave->employee->leave_balance - $request->leave_amount,
            ]);
            return redirect('admin/pendingLeave')->withSuccess('Leave have been approved!');

            }
            elseif($request->status == -1){

            return redirect('admin/pendingLeave')->withSuccess('Leave have been rejected!');

        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */


    public function cancel(Leave $leave)
    {
        Leave::destroy($leave->id);
                alert()->success('Success','Request have been canceled!');

        return redirect('user/home');
    }
}
