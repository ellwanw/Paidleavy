<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .font-th {
            font-size: 15px;
        }

        .font-td {
            font-size: 14px;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Employee Leaves Report</title>
</head>

<body>

    <h3 class="text-center mb-4">Employee Leaves Report</h3>

    <table class="table table-striped table-hover text-center table-shadow">
        <thead>
            <tr>
                <th scope="col" class="font-th">No</th>
                <th scope="col" class="font-th">Leave ID</th>
                <th scope="col" class="font-th">Name</th>
                <th scope="col" class="font-th">Start Date</th>
                <th scope="col" class="font-th">End Date</th>
                <th scope="col" class="font-th">Leave Taken</th>
                <th scope="col" class="font-th">Status</th>
                <th scope="col" class="font-th">Type of Leave</th>
                <th scope="col" class="font-th">Description</th>
            </tr>
        </thead>
        @foreach ($leaves as $leave)

        <tr>
            <th scope="row" class="font-td">{{$loop->iteration}}</th>
            <td class="font-td">{{$leave->leave_code}}</td>
            <td class="font-td">{{$leave->employee->name}}</td>
            <td class="font-td">{{date_format(new DateTime($leave->start_date), 'd-m-Y')}}</td>
            <td class="font-td">{{date_format(new DateTime($leave->enddate), 'd-m-Y')}}</td>
            <td class="font-td">{{$leave->leave_amount}}</td>
            @if ($leave->status == -1)
            <td class="font-td">Rejected</td>
            @elseif($leave->status == 1)
            <td class="font-td">Approved</td>
            @endif
            <td class="font-td">{{$leave->type_of_leave}}</td>
            <td class="font-td">{{$leave->description}}</td>
        </tr>
        @endforeach

    </table>
    </tbody>

    </table>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>