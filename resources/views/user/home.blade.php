@extends('layouts.user')

@section('content')
<div class="available">
    <!-- Dashboard User here -->
    <h3 class="mt-5 pt-3">User's Dashboard</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card mt-5 admin-card">
                    <div class="card-body card-content">
                        <div>
                            <h1>{{ $myLeaves->count() }}</h1>
                            <h5 class="card-title">Leave History</h5>
                        </div>
                        <i class='bx bx-history'></i>
                    </div>

                    <div class="card-footer">
                        <a href="{{Route('user.historyLeave.index')}}" class="card-link">View More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card mt-5 admin-card">
                    <div class="card-body card-content">
                        <div>
                            <h1>{{ $leaveRejected->count() }}</h1>
                            <h5 class="card-title">Rejected Leave</h5>
                        </div>
                        <i class='bx bxs-x-circle'></i>
                    </div>

                    <div class="card-footer">
                        <a href="{{Route('user.rejectedLeave.index')}}" class="card-link">View More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card mt-5 admin-card">
                    <div class="card-body card-content">
                        <div>
                            <h1>{{ $leaveApproved->count() }}</h1>
                            <h5 class="card-title">Approved Leave</h5>
                        </div>
                        <i class='bx bxs-check-circle'></i>
                    </div>

                    <div class="card-footer">
                        <a href="{{Route('user.approvedLeave.index')}}" class="card-link">View More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card mt-5 admin-card">
                    <div class="card-body card-content" style="padding-top:2rem">
                        <div>
                            <h5 class="card-title">My</h5>
                            <h5 class="card-title"> Profile</h5>
                        </div>
                        <i class='bx bxs-user-circle'></i>
                    </div>

                    <div class="card-footer">
                        <a href="#" class="card-link" data-toggle="modal" data-target="#showProfile">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="jumbotron information-jumbotron">

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if ($waitingLeave->count() == 1)
    @foreach ($waitingLeave as $wl)
    <div class="leaveStatus text-dark">
        <div class="card bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header ">
                <h4>Leave Status</h4>
            </div>
            <div class="card-body">
                <h6 class="card-text">
                    <ul class="list-unstyled">
                        <li class="mb-2">From : {{date_format(new DateTime($wl->start_date), 'd-m-Y')}}</li>
                        <li class="mb-2">Till : {{date_format(new DateTime($wl->end_date), 'd-m-Y')}}</li>
                        <li class="mb-2">Description : {{$wl->description}}</li>
                        <li class="mb-2">Leave Amount : {{$wl->leave_amount}}</li>
                        @if ($wl->status == '0')
                        <li class="mb-2">Leave Status : Waiting</li>
                        @endif
                        <br>
                        <a href="leave/{{$wl->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a>

                        <a href="#" data-id="{{$wl->id}}" id="post_title{{$wl->id}}"
                            class="btn btn-danger swal-confirm">
                            <form action="leave/{{$wl->id}}" class="d-inline" id="delete{{$wl->id}}" method="POST">
                                @method('delete')
                                @csrf
                            </form>
                            Cancel Application
                        </a>

                        {{-- <form action="leave/{{$wl->id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Cancel Application</i></button>
                        </form> --}}



                    </ul>
                </h6>
            </div>
            @endforeach
            @else
            <h1 class="display-4">Welcome, {{Auth::user()->employee->name}}</h1>
            <p class="lead">
                Currently there is no new request for leave</p>
            <hr class="my-4">
            <a href="{{Route('user.leave.create')}}"><button type="button" class="btn btn-primary">Apply for
                    leave</button></a>
            <p class="lead">
            </p>
            @endif
        </div>
    </div>
</div>

<div class="notavailable">
    <img src="../assets\img\notavailable.png">

</div>
@endsection