@extends('layouts/user')

@section('content')
<h4 class="mt-5 pt-3 mb-3">Approved Leave</h4>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<table class="table table-striped table-hover text-center table-shadow table-responsive">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Leave ID</th>
            <th scope="col">Submission Date</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Status</th>
            <th scope="col">Approver</th>
            <th scope="col">Approved Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <?php $i = $leaves->firstItem();?>
    <tbody>
        @if($leaves->count() > 0 )
        @foreach ($leaves as $leave)
        <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$leave->leave_code}}</td>
            <td>{{date_format(new DateTime($leave->submit_date), 'd-m-Y')}}</td>
            <td>{{date_format(new DateTime($leave->start_date), 'd-m-Y')}}</td>
            <td>{{date_format(new DateTime($leave->end_date), 'd-m-Y')}}</td>
            @if ($leave->status == 1)
            <td>Approved</td>
            @endif
            <td>{{$leave->approver}}</td>
            <td>{{$leave->approved_date}}</td>
            <td>
                <form action="/softDelete/{{$leave->id}}" method="POST" class="d-inline">
                    @method('patch')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="bx bx-trash-alt bx-xs"></i></button>
                </form>
            </td>
        </tr>
        <?php $i++; ?>
        @endforeach
        @else
        <td align="center" colspan="9">No Transaction Found</td>
        @endif
    </tbody>
</table>
<div class=" d-flex justify-content-center">
    {{ $leaves->links() }}
</div>
<a href="{{Route('user.home')}}" class="text-white"><button type="button" class="btn btn-secondary">Back</button></a>

@endsection