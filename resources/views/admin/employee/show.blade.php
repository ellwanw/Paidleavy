@extends('layouts/admin')

@section('content')
<h4 class="mt-5 pt-3 mb-3">Employee Data Detail</h4>
<div class="foto-detailkaryawan" style="position: absolute; left:65%;">
    <img src="/images/{{$employee->path}}" style="width: 40%;">
</div>
<table class="table table-striped table-hover table-karyawan w-75 ml-5">
    <tr>
        <th scope="col">Employee ID</th>
        <td>{{$employee->employee_id}}</td>
    </tr>
    <tr>
        <th scope="col">Name</th>
        <td>{{$employee->name}}</td>
    </tr>
    <tr>
        <th scope="col">Status</th>
        <td>{{$employee->status}}</td>
    </tr>
    <tr>
        <th scope="col">Date of Entry</th>
        <td>{{date_format(new DateTime($employee->date_of_entry), 'd-m-Y')}}</td>
    </tr>
    <tr>
        <th scope="col">Department</th>
        <td>{{$employee->department}}</td>
    </tr>
    <tr>
        <th scope="col">Position</th>
        <td>{{$employee->position}}</td>
    </tr>
    <tr>
        <th scope="col">Leave Balance</th>
        <td>{{$employee->leave_balance}}</td>
    </tr>
</table>
<br>


<a href="{{Route('admin.employee.index')}}" class="text-white ml-5"><button type="button"
        class="btn btn-secondary">Back</button></a>

<a href="#" data-id="{{$employee->id}}" id="post_title{{$employee->id}}" class="btn btn-danger swal-confirm">
    <form action="{{$employee->id}}" class="d-inline" id="delete{{$employee->id}}" method="POST">
        @method('delete')
        @csrf
    </form>
    Delete
</a>

<a href="{{$employee->id}}/edit"><button class="btn btn-warning text-white">Edit</button></a>
@endsection