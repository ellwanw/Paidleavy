@extends('layouts.admin')

@section('content')
<br>
<h4>Edit Employee</h4>
@if (session('status'))
<div class="alert alert-danger">
    {{ session('status') }}
</div>
@endif
{!! Form::open(['method'=>'PATCH','action'=>['EmployeeController@update',$employee->id],'files'=>true]) !!}
<div class="card pt-3 ">
    <div class="form-group row offset-md-1">
        {!! Form::label('employee_id', 'Employee ID :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <input type="text" name="employee_id" id="employee_id" placeholder="Employee ID" class="form-control w-50 
        @error('employee_id') is-invalid @enderror" value="{{$employee->employee_id}}">

            @error('employee_id')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row offset-md-1">
        {!! Form::label('name', 'Name :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <input type="text" name="name" id="name" placeholder="Name" class="form-control w-50 
            @error('name') is-invalid @enderror" value="{{$employee->name}}">

            @error('name')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row offset-md-1">
        {!! Form::label('date_of_entry', 'Date of Entry:', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <input type="date" name="date_of_entry" id="date_of_entry" placeholder="Date of Entry" class="form-control w-50 
        @error('date_of_entry') is-invalid @enderror" value="{{$employee->date_of_entry}}">

            @error('date_of_entry')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row offset-md-1">
        {!! Form::label('position', 'Position :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <select id="position" name="position" class="form-control w-50 @error('position') is-invalid @enderror">
                <option value="{{$employee->position}}">{{$employee->position}}</option>
                @foreach ($positions as $position)
                <option value="{{$position->name}}">{{$position->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row offset-md-1">
        {!! Form::label('department', 'Department :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <select id="department" name="department" class="form-control w-50">
                <option value="{{$employee->department}}">{{$employee->department}}</option>
                @foreach ($departments as $department)
                <option value="{{$department->name}}">{{$department->name}}</option>
                @endforeach
            </select> </div>
    </div>
    <div class="form-group row offset-md-1">
        {!! Form::label('status', 'Status :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <select id="status" name="status" class="form-control w-50">
                <option value="{{$employee->status}}">{{$employee->status}}</option>
                <option value="Regular Worker">Regular Worker</option>
                <option value="Temporary Worker">Temporary Worker</option>
                <option value="Daily Worker">Daily Worker</option>
            </select> </div>
    </div>

    <div class="form-group row offset-md-1">
        {!! Form::label('image', 'Image :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <img src="/images/{{$employee->path}}" style="width: 20%">
            <br>
            {!! Form::file('path',['class'=>'form-control-file w-50','accept'=>'image/*']) !!}
        </div>
    </div>

    <input type="hidden" name="oldpath" value="{{$employee->path}}">

    <div class="form-group offset-md-1 offset-sm-1 mt-4" style="margin-left:25%;">
        {!! Form::submit('Edit', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
<br>
<a href="/admin/employee/{{$employee->id}}" class="text-white"><button type="button"
        class="btn btn-secondary">Back</button></a>

@endsection