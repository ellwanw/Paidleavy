@extends('layouts/admin')

@section('content')
<h4 class="mt-5 pt-3 mb-3">Department List</h4>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<a href="{{Route('admin.department.create')}}"><button type="button" class="btn btn-primary mb-3"> Add Department
        <i class="fas fa-building"></i>
    </button></a>
<table class="table table-striped table-hover text-center table-shadow table-responsive">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Department ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($departments->count() > 0)
        @foreach ($departments as $department) <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$department->department_id}}</td>
            <td>{{$department->name}}</td>
            <td>
                <a href="department/{{$department->id}}/edit"><button class="btn btn-warning"><i
                            class="bx bx-edit-alt bx-xs"></i></button></a>
            </td>
        </tr>
        @endforeach
        @else
        <td align="center" colspan="4">No Department Found</td>
        @endif
    </tbody>

</table>
<a href="{{Route('admin.home')}}" class="text-white"><button type="button" class="btn btn-secondary">Back</button></a>

@endsection