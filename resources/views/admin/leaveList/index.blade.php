@extends('layouts/admin')

@section('content')
<h4 class="mt-5 pt-3 mb-3">Leave List</h4>
<div class="d-flex justify-content-between">

    <form action="/admin/filterDate" method="get" class="form-inline">

        <div class="input-group ">
            <div class="input-group-prepend">
                <label class="input-group-text" for="month">Month</label>
            </div>
            <select class="custom-select" id="month" name="month">
                <option value="">All</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>

            <div class="input-group-prepend ml-3">
                <label class="input-group-text" for="year">Year</label>
                <select class="custom-select" id="year" name="year">
                    <option value="">All</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary ml-3"><i class="fa fa-search"></i></button>

    </form>
    <a href="{{Route('admin.leaveList.print')}}"><button class="btn btn-danger mr-1">Print PDF</button></a>
</div>

@if (session(' status')) <div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<table class="table table-striped table-hover text-center table-shadow table-responsive mt-2">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Leave ID</th>
            <th scope="col">Name</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Leave Taken</th>
            <th scope="col">Status</th>
            <th scope="col">Type of Leave</th>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = $leaves->firstItem();?>
        @if($leaves->count() > 0 )
        @foreach ($leaves as $leave)
        <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$leave->leave_code}}</td>
            <td>{{$leave->employee->name}}</td>
            <td>{{$leave->start_date}}</td>
            <td>{{$leave->end_date}}</td>
            <td>{{$leave->leave_amount}}</td>
            @if ($leave->status == -1)
            <td>Rejected</td>
            @elseif($leave->status == 1)
            <td>Approved</td>
            @endif
            <td>{{$leave->type_of_leave}}</td>
            <td>{{$leave->description}}</td>
            </td>
        </tr>
        <?php $i++;?>
        @endforeach
        @else
        <td align="center" colspan="8">No Transaction Found</td>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $leaves->links() }}
</div>
<a href="{{Route('admin.home')}}" class="text-white"><button type="button" class="btn btn-secondary">Back</button></a>

@endsection