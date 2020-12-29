<!-- Logout -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">
                    Are you sure want to logout ?
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Back
                </button>
                <button type="button" class="btn btn-danger">
                    <a href="{{Route('logout')}}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="text-white text-decoration-none">
                        {{'Logout'}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>



{{-- Show Profile --}}

<div class="modal fade" id="showProfile" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white">
                    My Profile
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <table class="table table-striped table-hover ">
                    <img src="/images/{{Auth::user()->employee->path}}"
                        style="margin-right:9rem;border-radius:40px;width:40%">
                    <tr>
                        <th scope=" col">Employee ID</th>
                        <td>{{Auth::user()->employee->employee_id}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Name</th>
                        <td>{{Auth::user()->employee->name}}</td>
                    </tr>

                    <tr>
                        <th scope="col">Date of Entry</th>
                        <td>{{date_format(new DateTime(Auth::user()->employee->date_of_entry), 'd-m-Y')}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Department</th>
                        <td>{{Auth::user()->employee->department}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Position</th>
                        <td>{{Auth::user()->employee->position}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Status</th>
                        <td>{{Auth::user()->employee->status}}</td>
                    </tr>
                    <tr>
                        <th scope="col">Leave Balance</th>
                        <td>{{Auth::user()->employee->leave_balance}}</td>
                    </tr>
                </table>
                <a href="#" data-toggle="modal" data-target="#changePassword"><button class="btn btn-primary">Change
                        Password</button></a>
            </div>
        </div>
    </div>

    {{-- Change Password  --}}

    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">
                        Change Password
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer pr-5">
                    {!!
                    Form::open(['method'=>'PATCH','action'=>['EmployeeController@changePassword2',Auth::user()->employee->id],'files'=>true])
                    !!}

                    <div class="form-group row">
                        {!! Form::label('oldpassword', 'Old Password', ['class'=>'col-sm-2 col-md-6 col-form-label'])!!}
                        <div class="col-sm-10 col-md-6">
                            {!! Form::password('oldpassword', ['class'=>'form-control','placeholder'=>'Old Password'])
                            !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('newpassword', 'New Password', ['class'=>'col-sm-2 col-md-6 col-form-label'])
                        !!}
                        <div class="col-sm-10 col-md-6">
                            {!! Form::password('newpassword', ['class'=>'form-control','placeholder'=>'New Password'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('confirmnewpassword', 'Confirm New Password', ['class'=>'col-sm-2 col-md-6
                        col-form-label'])
                        !!}
                        <div class="col-sm-10 col-md-6">
                            {!! Form::password('confirmnewpassword',
                            ['class'=>'form-control','placeholder'=>'Confirm New
                            Password'])
                            !!}
                        </div>
                    </div>
                    <div class="form-group offset-md-1 offset-sm-1 mt-4" style="margin-left:87%;">
                        {!! Form::submit('Change', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>