@extends('layouts.user')
@section('content')

<h4 class="mt-5 pt-3 mb-3">Leave Application Edit Form</h4>


{!! Form::open(['method'=>'PATCH','action'=>['LeaveController@update',$leave->id],'files'=>true]) !!}


<div class="card pt-3 ">
    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-2 col-sm-2 ">
            {!! Form::label('leave_id', 'Leave ID') !!}
            {!! Form::text('leave_id', $leave->leave_code, ['class'=>'form-control','readonly']) !!}
        </div>

        <div class=" form-group col-md-2 col-sm-">
            {!! Form::label('input_date', 'Input Date') !!}
            {!! Form::text('input_date', $leave->input_date, ['class'=>'form-control','readonly']) !!}
        </div>

        <div class=" form-group ml-3 col-md-4 col-sm-4 ">
            {!! Form::label('type_of_leave', 'Type of Leave') !!}
            <select id="type_of_leave" name="type_of_leave"
                class="form-control @error('type_of_leave') is-invalid @enderror">
                <option value="{{$leave->type_of_leave}}">{{$leave->type_of_leave}}</option>
                <option value="Business Trip" @if (old('type_of_leave')=='Business Trip' ) selected="selected" @endif>
                    Business Trip</option>
                <option value="Sick Leave" @if (old('type_of_leave')=='Sick Leave' ) selected="selected" @endif>
                    Sick Leave</option>
                <option value="Maternity Leave" @if (old('type_of_leave')=='Maternity Leave' ) selected="selected"
                    @endif>
                    Maternity Leave</option>
                <option value="Annual Leave" @if (old('type_of_leave')=='Annual Leave' ) selected="selected" @endif>
                    Annual Leave</option>
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4">
            {!! Form::label('name', 'Name') !!}

            {!! Form::text('name', Auth::user()->name, ['class'=>'form-control','readonly']) !!}
        </div>

        <div class="form-group ml-3 col-md-4 col-sm-4">
            {!! Form::label('description', 'Description') !!}
            <input type="text" name="description" id="description"
                class="form-control @error('description') is-invalid @enderror" value="{{$leave->description}}"
                placeholder="Description">
            @error('description')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4 ">
            {!! Form::label('employee_id', 'Employee ID') !!}
            {!! Form::text('employee_id', Auth::user()->employee->id,
            ['class'=>'form-control','readonly'])!!}
        </div>
        <div class="form-group ml-3 col-md-2 col-sm-2 ">
            {!! Form::label('leave_balance', 'Leave Balance') !!}
            {!! Form::number('leave_balance', Auth::user()->employee->leave_balance,
            ['class'=>'form-control','onkeyup'=>'sum();','readonly']) !!}
        </div>
        <div class="form-group ml-3 col-md-2 col-sm-2 ">
            {!! Form::label('start_date', 'Start Date') !!}
            <input type="date" name="start_date" id="start_date" placeholder="start_date" class="form-control 
            @error('start_date') is-invalid @enderror" value="{{$leave->start_date}}">
            @error('start_date')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4 ">
            {!! Form::label('department', 'Department') !!}
            {!! Form::text('department', Auth::user()->employee->department,
            ['class'=>'form-control','readonly'])!!}
        </div>
        <div class="form-group ml-3 col-md-2 col-sm-2 ">
            {!! Form::label('leave_amount', 'Leave Amount') !!}
            <input type="number" name="leave_amount" id="leave_amount" class="form-control 
            @error('leave_amount') is-invalid @enderror" value="{{$leave->leave_amount}}" onkeyup="sum()"
                max="{{Auth::user()->employee->leave_balance}}">
            @error('leave_amount')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group ml-3 col-md-2 col-sm-2 ">
            {!! Form::label('current_leave', 'Current Leave') !!}
            {!! Form::text('current_leave', Auth::user()->employee->leave_balance - $leave->leave_amount,
            ['class'=>'form-control','readonly']) !!}
        </div>

    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4">
            {!! Form::label('position', 'Position') !!}
            {!! Form::text('position', Auth::user()->employee->position,
            ['class'=>'form-control','readonly'])!!}
        </div>

        <div class="form-group ml-3 col-md-4 col-sm-4">
            {!! Form::label('phone', 'Phone Number') !!}
            <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{$leave->phone}}">
            @error('phone')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>
    </div>

    <div class="form-group offset-md-1 offset-sm-1 mt-3">
        {!! Form::submit('Save Changes', ['class'=>'btn btn-primary']) !!}
        <a href="{{Route('user.home')}}"><button type="button" class="btn btn-secondary">Back</button></a>
    </div>
</div>
{!! Form::close() !!}
@endsection