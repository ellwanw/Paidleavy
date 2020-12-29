@extends('layouts.user')
@section('content')

<h4 class="mt-5 pt-3 mb-3">Leave Application</h4>


{!! Form::open(['method'=>'POST','action'=>'LeaveController@store','files'=>true]) !!}


<div class="card pt-3 ">
    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-2 col-sm-2 ">
            {!! Form::label('leave_code', 'Leave ID') !!}
            <?php $a = "CT"; $b = rand(1000, 10000); $c = $a . $b; ?>
            {!! Form::text('leave_code',$c,['class'=>'form-control','readonly','placeholder'=>'Leave ID']) !!}
        </div>

        <div class=" form-group col-md-2 col-sm-2 mr-3">
            {!! Form::label('submit_date', 'Submit Date') !!}
            {!! Form::date('submit_date',date('Y-m-d'),['class'=>'form-control','readonly','placeholder'=>'Input
            Date']) !!}
        </div>

        <div class=" form-group col-md-4 col-sm-4 ">
            {!! Form::label('type_of_leave', 'Type of Leave') !!}
            <select id="type_of_leave" name="type_of_leave"
                class="form-control @error('type_of_leave') is-invalid @enderror">
                <option value="">----- Choose Type of Leave -----</option>
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
            @error('type_of_leave')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4 mr-3">
            {!! Form::label('name', 'Name') !!}
            {!!
            Form::text('name',Auth::user()->employee->name,['class'=>'form-control','readonly','placeholder'=>'Name'])
            !!}
        </div>

        <div class="form-group col-md-4 col-sm-4">
            {!! Form::label('description', 'Description') !!}
            <input type="text" name="description" id="description"
                class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}"
                placeholder="Description">
            @error('description')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4 mr-3">
            {!! Form::label('employee_id', 'Employee ID') !!}
            {!!
            Form::text('employee_id',Auth::user()->employee->id,['class'=>'form-control','readonly','placeholder'=>'Employee
            ID'])!!}
        </div>
        <div class="form-group col-md-2 col-sm-2 mr-3">
            {!! Form::label('leave_balance', 'Leave Balance') !!}
            {!!
            Form::text('leave_balance',Auth::user()->employee->leave_balance,['class'=>'form-control','onkeyup'=>'sum();','readonly'])
            !!}
        </div>
        <div class="form-group  col-md-2 col-sm-2 ">
            {!! Form::label('start_date', 'Start Date') !!}
            <input type="date" name="start_date" id="start_date" placeholder="start_date" class="form-control 
            @error('start_date') is-invalid @enderror" value="{{old('start_date')}}">
            @error('start_date')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

    </div>




    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4 mr-3">
            {!! Form::label('department', 'Department') !!}
            {!!
            Form::text('department',Auth::user()->employee->department,['class'=>'form-control','readonly','placeholder'=>'Department'])!!}
        </div>
        <div class="form-group col-md-2 col-sm-2 mr-3">
            {!! Form::label('leave_amount', 'Leave Amount') !!}
            <input type="number" name="leave_amount" id="leave_amount" class="form-control 
            @error('leave_amount') is-invalid @enderror" value="{{old('leave_amount')}}" onkeyup="sum()"
                max="{{Auth::user()->employee->leave_balance}}" min="1">
            @error('leave_amount')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>


        <div class="form-group col-md-2 col-sm-2 ">
            {!! Form::label('current_leave', 'Current Leave') !!}
            {!! Form::text('current_leave',null,['class'=>'form-control','readonly']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4 mr-3">
            {!! Form::label('position', 'Position') !!}
            {!!
            Form::text('position',Auth::user()->employee->position,['class'=>'form-control','readonly','placeholder'=>'Position'])!!}
        </div>

        <div class="form-group col-md-4 col-sm-4">
            {!! Form::label('phone', 'Phone Number') !!}
            <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{old('phone')}}">
            @error('phone')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group offset-md-1 offset-sm-1 mt-3">
        {!! Form::submit('Apply', ['class'=>'btn btn-primary']) !!}
        <a href="{{Route('user.home')}}"><button type="button" class="btn btn-secondary">Back</button></a>
    </div>

</div>
{!! Form::close() !!}
@endsection