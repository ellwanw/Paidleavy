@extends('layouts/admin')

@section('content')
<h4 class="mt-5 pt-3 mb-3">Pending Leave List</h4>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<table class="table table-striped table-hover text-center table-shadow table-responsive">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Submission Date</th>
            <th scope="col">Name</th>
            <th scope="col">Employee ID</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = $leaves->firstItem();?>
        @if($leaves->count() > 0)
        @foreach ($leaves as $leave)
        <tr>
            <th scope="row">{{$i}}</th>
            <td>{{date_format(new DateTime($leave->submit_date), 'd-m-Y')}}</td>
            <td>{{$leave->employee->name}}</td>
            <td>{{$leave->employee->employee_id}}</td>
            <td>{{date_format(new DateTime($leave->start_date), 'd-m-Y')}}</td>
            <td>{{date_format(new DateTime($leave->end_date), 'd-m-Y')}}</td>
            <td><a href="pendingLeave/{{$leave->id}}/edit" class="text-white"><button type="button"
                        class="btn btn-primary" type="button">
                        <i class="bx bx-search-alt bx-xs"></i>
                    </button></a>
            </td>
        </tr>
        <?php $i++;?>
        @endforeach
        @else
        <td align="center" colspan="8">No Leaves Found</td>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $leaves->links() }}
</div>
<a href="{{Route('admin.home')}}" class="text-white"><button type="button" class="btn btn-secondary">Back</button></a>

@endsection