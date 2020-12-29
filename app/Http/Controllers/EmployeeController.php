<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Hash;
use Image;
use Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function changePassword1(Request $request, Employee $employee)
    {
        $password = $employee->user->password;
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;
        $confirmnewpassword = $request->confirmnewpassword;

        
        if (Hash::check($oldpassword, $password)) {

            if($newpassword == $confirmnewpassword){
                User::where('employee_id',$employee->id)->update([
                    'password' => Hash::make($newpassword),
                    ]);
                }
                alert()->error('Ooops','Password not match !!');
                return redirect()->back();
        }
        alert()->error('Ooops','Wrong old password!');
        return redirect()->back();
    }

    public function changePassword2(Request $request, Employee $employee)
    {
        $password = $employee->user->password;
        $oldpassword = $request->oldpassword;
        $newpassword = $request->newpassword;
        $confirmnewpassword = $request->confirmnewpassword;

        
        if (Hash::check($oldpassword, $password)) {

            if($newpassword == $confirmnewpassword){
                User::where('employee_id',$employee->id)->update([
                    'password' => Hash::make($newpassword),
                    ]);
                }
                alert()->error('Ooops','Password not match !!');
                return redirect()->back();
        }
        alert()->error('Ooops','Wrong old password!');
        return redirect()->back();
    }

    public function index()
    {
        $employees = Employee::paginate(5);
        return view('admin.employee.index' , compact('employees'));
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$employees = DB::table('employees')
		->where('name','like',"%".$cari."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('admin.employee.index',compact('employees'));

	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $departments = Department::all();
        $positions = Position::all();
        return view('admin.employee.create',compact('departments','positions'));
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
            'employee_id' => 'required|digits_between:7,10',
            'name' => 'required',
            'date_of_entry' => 'required|date',
            'department' => 'required',
            'position' => 'required',
            'status' => 'required',
            'path' => 'mimes:jpeg,jpg,png',
        ]);

        $employee_count = Employee::where('name',$request->name)->count();

        if($employee_count == 1){
            alert()->error('Ooops','Employee already exist!');
            return redirect('admin/employee/create');

        }else{
                $input = $request->all();
                if ($file = $request->file('path')){
                    $ext = $file->getClientOriginalExtension();
                    $name = uniqid() . '.' . $ext;
                    $file->move('images',$name);
                    $input['path'] = $name; 
                }
                Employee::create($input);
                alert()->success('Success','Employee have been created!');
                return redirect('admin/employee');

            }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('admin.employee.edit',compact('employee','departments','positions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {

        request()->validate([
            'employee_id' => 'required',
            'name' => 'required',
            'date_of_entry' => 'required',
            'department' => 'required',
            'position' => 'required',
            'status' => 'required',
            'path' => 'mimes:jpeg,jpg,png',
        ]);

        $input = $request->all();

            if(!$request->path){
                $input['path'] = $request->oldpath;
            }

                if ($file = $request->file('path')){
                    $ext = $file->getClientOriginalExtension();
                    $name = uniqid() . '.' . $ext;
                    $file->move('images',$name);
                    $input['path'] = $name; 
                }
            
                
        Employee::where('id',$employee->id)->update([
            'employee_id' => $request->employee_id,
            'name' => $request->name,
            'date_of_entry' => $request->date_of_entry,
            'department' => $request->department,
            'position' => $request->position,
            'status' => $request->status,
            'path' => $input['path'],            
        ]);
        alert()->success('Success','Employee have been updated!');

        return redirect('admin/employee/'.$employee->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);
        alert()->success('Success','Employee have been deleted!');

        return redirect('admin/employee');
    }


}
