@extends('layouts/admin')

@section('content')
@include('sweetalert::alert')

<h4 class="mt-5 pt-3 mb-3">Position List</h4>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<a href="{{Route('admin.position.create')}}"><button type="button" class="btn btn-primary mb-3"> Add Position
        <i class="fab fa-black-tie"></i>
    </button></a>
<table class="table table-striped table-hover text-center table-shadow table-fit table-responsive">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Position ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($positions->count() > 0)
        @foreach ($positions as $position)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$position->position_id}}</td>
            <td>{{$position->name}}</td>
            <td>
                <a href="position/{{$position->id}}/edit"><button class="btn btn-warning"><i
                            class="bx bx-edit-alt bx-xs"></i></button></a>
            </td>
        </tr>
        @endforeach
        @else
        <td align="center" colspan="4">No Position Found</td>
        @endif
    </tbody>
</table>
<a href="{{Route('admin.home')}}" class="text-white"><button type="button" class="btn btn-secondary">Back</button></a>

@endsection