<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index' , compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');

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
            'department_id' => 'required',
            'name' => 'required',
        ]);
        Department::create($request->all());
        alert()->success('Success','Department have been created!');
                return redirect('admin/department');
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('admin.department.edit',compact('department'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        request()->validate([
            'department_id' => 'required',
            'name' => 'required',
        ]);

        Department::where('department_id',$department->department_id)->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
        ]);
        alert()->success('Success','Department have been updated!');

        return redirect('admin/department');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    { 
        Department::destroy($department->id);
        alert()->success('Success','Department have been deleted!');

        return redirect('admin/department');

    }
}
