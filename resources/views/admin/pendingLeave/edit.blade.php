@extends('layouts/admin')
@section('content')
<h4 class="mt-5 pt-3 mb-3">Form Approval Cuti</h4>

{!! Form::open(['method'=>'PATCH','action'=>['LeaveController@updatePending',$leave->id],'files'=>true]) !!}

<input type="hidden" name="tanggalkeputusan" value="<?= date('d-m-Y'); ?>">

<div class="card pt-3 mb-5">
    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 w-25  col-md-4 col-sm-4">
            {!! Form::label('approver', 'Approver') !!}
            <input type="text" name="approver" id="approver" placeholder="Approver"
                class="form-control @error('approver') is-invalid @enderror" value="{{old('approver')}}">
            @error('approver')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>

        <div class="form-group ml-3 w-25 col-md-4 col-sm-4">
            {!! Form::label('type_of_leave', 'Type of Leave') !!}
            {!! Form::text('type_of_leave', $leave->type_of_leave, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 w-25  col-md-4 col-sm-4">
            {!! Form::label('submit_date', 'Submission Date') !!}
            {!! Form::text('submit_date', date_format(new DateTime($leave->submit_date), 'd-m-Y'),
            ['class'=>'form-control','readonly']) !!}
        </div>

        <div class="form-group ml-3 w-25 col-md-4 col-sm-4">
            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', $leave->description, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4 ">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $leave->employee->name, ['class'=>'form-control','readonly']) !!}
        </div>
        <div class="form-group ml-3 col-md-2 col-sm-1 ">
            {!! Form::label('leave_balance', 'Balance') !!}
            {!! Form::text('leave_balance', $leave->employee->leave_balance, ['class'=>'form-control','readonly']) !!}
        </div>
        <div class="form-group col-md-2 col-sm-1">
            {!! Form::label('leave_amount', 'Amount') !!}
            {!! Form::text('leave_amount', $leave->leave_amount, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4 ">
            {!! Form::label('employee_id', 'Employee ID') !!}
            {!! Form::text('employee_id', $leave->employee->employee_id, ['class'=>'form-control','readonly']) !!}
        </div>
        <div class="form-group ml-3 col-md-2 col-sm-1 ">
            {!! Form::label('start_date', 'Start Date') !!}
            {!! Form::text('start_date', date_format(new DateTime($leave->start_date), 'd-m-Y'),
            ['class'=>'form-control','readonly']) !!}
        </div>
        <div class="form-group col-md-2 col-sm-1">
            {!! Form::label('end_date', 'End Date') !!}
            {!! Form::text('end_date', date_format(new DateTime($leave->end_date), 'd-m-Y'),
            ['class'=>'form-control','readonly']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4">
            {!! Form::label('department', 'Department') !!}
            {!! Form::text('department', $leave->employee->department, ['class'=>'form-control','readonly']) !!}
        </div>

        <div class="form-group ml-3 col-md-4 col-sm-4">
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::text('phone', $leave->phone, ['class'=>'form-control','readonly']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group offset-md-1 offset-sm-1 col-md-4 col-sm-4">
            {!! Form::label('position', 'Position') !!}
            {!! Form::text('position', $leave->employee->position, ['class'=>'form-control','readonly']) !!}
        </div>

        <div class="form-group mt-4 ml-3">
            {!! Form::radio('status', '+1',true ) !!} Approve
            {!! Form::radio('status', '-1',true,['class'=>'ml-3 mt-3']) !!} Reject

        </div>
    </div>

    <div class="form-group offset-md-1 offset-sm-1 mt-3 mb-5">
        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        <a href="{{Route('admin.pendingLeave.index')}}"><button type="button"
                class="btn btn-secondary">Back</button></a>
    </div>

</div>

</form>

@endsection