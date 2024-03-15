@extends('master')
@section('content')
<div class="container">
    <h1>Pending Leave Requests</h1>
    @if ($leaveApplications->isEmpty())
        <p>No pending leave requests.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reason</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaveApplications as $leaveApplication)
                    <tr>
                        <td>{{ $leaveApplication->employee->name }}</td>
                        <td>{{ $leaveApplication->leave_type }}</td>
                        <td>{{ $leaveApplication->start_date }}</td>
                        <td>{{ $leaveApplication->end_date }}</td>
                        <td>{{ $leaveApplication->reason }}</td>
                        <td>
                            <form method="post" action="{{ route('leave.approve', $leaveApplication) }}">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form method="post" action="{{ route('leave.reject', $leaveApplication) }}">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection