@extends('layouts.admin')

@section('content')
<br>
<h4>Create Employee</h4>
@if (session('status'))
<div class="alert alert-danger">
    {{ session('status') }}
</div>
@endif
{!! Form::open(['method'=>'POST','action'=>'EmployeeController@store','files'=>true]) !!}

<div class="card pt-3 ">
    <div class="form-group row offset-md-1">
        {!! Form::label('employee_id', 'Employee ID :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">

            <input type="text" name="employee_id" id="employee_id" placeholder="Employee ID" class="form-control w-50 
        @error('employee_id') is-invalid @enderror" value="{{old('employee_id')}}">

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
            @error('name') is-invalid @enderror" value="{{old('name')}}">

            @error('name')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class=" form-group row offset-md-1">
        {!! Form::label('date_of_entry', 'Date of Entry:', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <input type="date" name="date_of_entry" id="date_of_entry" placeholder="Date of Entry" class="form-control w-50 
        @error('date_of_entry') is-invalid @enderror" value="{{old('date_of_entry')}}">

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
                <option value="">----- Choose Position -----</option>
                @foreach ($positions as $position)
                <option {{ old('position') == $position->name ? "selected" : "" }} value="{{ $position->name }}">
                    {{$position->name}}</option>
                @endforeach
            </select>

            @error('position')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group row offset-md-1">
        {!! Form::label('department', 'Department :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <select id="department" name="department"
                class="form-control w-50 @error('department') is-invalid @enderror">
                <option value="">----- Choose Department -----</option>
                @foreach ($departments as $department)
                <option {{ old('department') == $department->name ? "selected" : "" }} value="{{ $department->name }}">
                    {{$department->name}}</option>
                {{$department->name}}</option>
                @endforeach
            </select>
            @error('department') <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row offset-md-1">
        {!! Form::label('status', 'Status :', ['class'=>'col-sm-2 col-form-label ']) !!}
        <div class="col-sm-10">
            <select id="status" name="status" class="form-control w-50 @error('status') is-invalid @enderror">
                <option value="">----- Choose Status -----</option>
                <option value="Regular Worker" @if (old('status')=='Regular Worker' ) selected="selected" @endif>Regular
                    Worker</option>
                <option value="Temporary Worker" @if (old('status')=='Temporary Worker' ) selected="selected" @endif>
                    Temporary Worker</option>
                <option value="Daily Worker" @if (old('status')=='Daily Worker' ) selected="selected" @endif>Daily
                    Worker</option>
            </select>
            @error('status')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group row offset-md-1">
        {!! Form::label('path', 'Image :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('path',['class'=>'form-control-file w-50','accept'=>'image/*','required']) !!}
        </div>
    </div>
    <div class="form-group offset-md-1 offset-sm-1 mt-4">
        {!! Form::submit('Create Employee', ['class'=>'btn btn-primary']) !!}
        <a href="{{Route('admin.employee.index')}}"><button type="button" class="btn btn-secondary ">Back</button></a>

    </div>

</div>
{!! Form::close() !!}


@endsection