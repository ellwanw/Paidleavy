@extends('layouts.admin')

@section('content')

<h4 class="mt-5 pt-3 mb-3">Leave List</h4>

{!! Form::open(['method'=>'GET','action'=>'LeaveController@createPDF','files'=>true]) !!}
<div class="card pt-3 ">
    <div class="form-group row offset-md-1">
        {!! Form::label('start_date', 'From :', ['class'=>'col-sm-2 col-form-label']) !!}

        <div class="col-sm-10">
            {!! Form::date('start_date',null, ['class'=>'form-control w-50']) !!}
        </div>
    </div>
    <div class="form-group row offset-md-1">
        {!! Form::label('end_date', 'Till :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::date('end_date',null, ['class'=>'form-control w-50']) !!}
        </div>
    </div>
    <div class="form-group offset-md-1 offset-sm-1 mt-4 " style="margin-left:25%;">
        <button type="submit" class="btn btn-danger"><i class='bx bx-printer'></i> Print</button>
    </div>
</div>
{!! Form::close() !!}
<br>
<a href="{{Route('admin.leaveList.index')}}"><button class="btn btn-secondary ">Back</button></a>

@endsection