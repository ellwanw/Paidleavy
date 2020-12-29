@extends('layouts.admin')

@section('content')
<br>
<h4>Edit Department</h4>
@if (session('status'))
<div class="alert alert-danger">
    {{ session('status') }}
</div>
@endif
{!! Form::open(['method'=>'PATCH','action'=>['DepartmentController@update',$department->id],'files'=>true]) !!}
<div class="card pt-3 ">
    <div class="form-group row offset-md-1">
        {!! Form::label('department_id', 'Department ID :', ['class'=>'col-sm-2 col-form-label']) !!}

        <div class="col-sm-10">
            {!! Form::text('department_id', $department->department_id, ['class'=>'form-control w-50','readonly']) !!}
        </div>
    </div>
    <div class="form-group row offset-md-1">
        {!! Form::label('name', 'Name :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <input type="text" name="name" id="name" value="{{$department->name}}" class="form-control w-50 
            @error('name') is-invalid @enderror" placeholder="Name">
            @error('name')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group offset-md-1 offset-sm-1 mt-4 " style="margin-left:25%;">
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}

    </div>

</div>
{!! Form::close() !!}
<br>
<a href="{{Route('admin.department.index')}}"><button class="btn btn-secondary ">Back</button></a>
<a href="#" data-id="{{$department->id}}" id="post_title{{$department->id}}" class="btn btn-danger swal-confirm">
    <form action="/admin/department/{{$department->id}}" class="d-inline" id="delete{{$department->id}}" method="POST">
        @method('delete')
        @csrf
    </form>
    Delete
</a>
@endsection