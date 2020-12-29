@extends('layouts.admin')

@section('content')
<br>
<h4>Add Department</h4>
@if (session('status'))
<div class="alert alert-danger">
    {{ session('status') }}
</div>
@endif
{!! Form::open(['method'=>'POST','action'=>'DepartmentController@store','files'=>true]) !!}
<div class="card pt-3 ">
    <div class="form-group row offset-md-1">
        {!! Form::label('department_id', 'Department ID :', ['class'=>'col-sm-2 col-form-label']) !!}

        <?php $a = "D"; $b = rand(1000, 10000); $c = $a . $b; ?>
        <div class="col-sm-10">
            {!! Form::text('department_id', $c, ['class'=>'form-control w-50','readonly']) !!}
        </div>
    </div>
    <div class="form-group row offset-md-1">
        {!! Form::label('name', 'Name :', ['class'=>'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            <input type="text" name="name" id="name" class="form-control w-50 @error('name') is-invalid @enderror"
                placeholder="Department Name">
            @error('name')
            <div class=" invalid-feedback">
                {{$message}}
            </div>
            @enderror

        </div>
    </div>
    <div class="form-group offset-md-1 offset-sm-1 mt-4 " style="margin-left:25%;">
        {!! Form::submit('Add', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
<br>
<a href="{{Route('admin.department.index')}}"><button class="btn btn-secondary ">Back</button></a>

@endsection