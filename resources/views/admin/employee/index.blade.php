@extends('layouts/admin')

@section('content')
@include('sweetalert::alert')

<h4 class="mt-5 pt-3 mb-3">Employee Data List</h4>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<a href="{{Route('admin.employee.create')}}"><button type="button" class="btn btn-primary mb-3"> Add Employee
        <i class="fa fa-user-plus ml-1" aria-hidden="true"></i>
    </button></a>

<form class="form-inline" action="/admin/employee/cari" method="GET">

    <input type="text" name="cari" placeholder="Search for employee name.." class="form-control" size="30">
    <button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
    <a href="{{Route('admin.employee.index')}}"><button type="button" class="btn btn-info text-white ml-5">Show
            All</button></a>
</form>

<table class="table table-striped table-hover text-center table-shadow mt-4 table-responsive">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Employee ID</th>
            <th scope="col">Name</th>
            <th scope="col">Department</th>
            <th scope="col">Position</th>
            <th scope="col">Status</th>
            <th scope="col">Leave Balance</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = $employees->firstItem();?>
        @if($employees->count() > 0)
        @foreach ($employees as $employee)
        <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$employee->employee_id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->department}}</td>
            <td>{{$employee->position}}</td>
            <td>{{$employee->status}}</td>
            <td>{{$employee->leave_balance}}</td>
            <td>
                <a href="/admin/employee/{{$employee->id}}" class="text-white"><button type="button"
                        class="btn btn-primary" type="button">
                        <i class="bx bx-search-alt bx-xs"></i>
                    </button></a>
            </td>
        </tr>
        <?php $i++; ?>
        @endforeach
        @else
        <td align="center" colspan="8">No Employee Found</td>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $employees->links() }}
</div>
<a href="{{Route('admin.home')}}" class="text-white"><button type="button" class="btn btn-secondary">Back</button></a>

@endsection