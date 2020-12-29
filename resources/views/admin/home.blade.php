@extends('layouts.admin')

@section('content')
<!-- Dashboard Admin here -->
<div class="available">

    <h3 class="mt-5 pt-3">Admin's Dashboard</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card mt-5 admin-card">
                    <div class="card-body card-content">
                        <div>
                            <h1>{{$totalEmployee}}</h1>
                            <h5 class="card-title">Employee</h5>
                        </div>
                        <i class="fa fa-users"></i>
                    </div>

                    <div class="card-footer">
                        <a href="{{Route('admin.employee.index')}}" class="card-link">View More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card mt-5 admin-card">
                    <div class="card-body card-content">
                        <div>
                            <h1>{{$totalDepartment}}</h1>
                            <h5 class="card-title">Department</h5>
                        </div>
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-footer">
                        <a href="{{Route('admin.department.index')}}" class="card-link">View More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card mt-5 admin-card">
                    <div class="card-body card-content">
                        <div>
                            <h1>{{$totalLeave}}</h1>
                            <h5 class="card-title">Leave List</h5>
                        </div>
                        <i class="bx bx-list-ul"></i>
                    </div>

                    <div class="card-footer">
                        <a href="{{Route('admin.leaveList.index')}}" class="card-link">View More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card mt-5 admin-card">
                    <div class="card-body card-content">
                        <div>
                            <h1>{{$totalPendingLeave}}</h1>
                            <h5 class="card-title">Pending Leave</h5>
                        </div>
                        <i class='bx bxs-time-five'></i>
                    </div>

                    <div class="card-footer">
                        <a href="{{Route('admin.pendingLeave.index')}}" class="card-link">View More</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Karyawan -->

        <h4 class="mt-5 pt-3 mb-3">Employee Data List</h4>
        <table class="table table-striped table-hover text-center table-shadow table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Position</th>
                    <th scope="col">Status</th>
                    <th scope="col">Leave Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $employees->firstItem();?>
                @if($employees->count() > 0)
                @foreach ($employees as $employee) <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$employee->employee_id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->department}}</td>
                    <td>{{$employee->position}}</td>
                    <td>{{$employee->status}}</td>
                    <td>{{$employee->leave_balance}}</td>
                </tr>
                <?php $i++;?>
                @endforeach
                @else
                <td align="center" colspan="7">No Employees Found</td>
                @endif
            </tbody>
        </table>
        {{$employees->links()}}
    </div>

</div>

<div class="notavailable">
    <img src="../assets\img\notavailable.png">
</div>
@endsection