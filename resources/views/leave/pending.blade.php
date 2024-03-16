@extends('master')

@section('content')
<div class="container mx-auto px-4 py-8">
 
    <div class="flex justify-center">
        <div class="overflow-x-auto">
            @if ($leaveApplications->isEmpty())
            <p class="text-gray-600">No pending leave requests.</p>
            @else
            <table class="table-auto w-full">
            <h1 class="text-2xl font-semibold mb-4">Pending Leave Requests</h1>
                <thead>
                    <tr>
                    <th class="px-4 py-2">Employee Id</th>
                    <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Leave Type</th>
                        <th class="px-4 py-2">Start Date</th>
                        <th class="px-4 py-2">End Date</th>
                        <th class="px-4 py-2">Reason</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveApplications as $leaveApplication)
                    <tr class="border-b border-gray-200">
                    <td class="px-4 py-2">{{ $leaveApplication->employee_id }}</td>
                    <td class="px-4 py-2">{{ $leaveApplication->name}}</td>
                        <td class="px-4 py-2">{{ $leaveApplication->leave_type }}</td>
                        <td class="px-4 py-2">{{ $leaveApplication->start_date }}</td>
                        <td class="px-4 py-2">{{ $leaveApplication->end_date }}</td>
                        <td class="px-4 py-2">{{ $leaveApplication->reason }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <form method="post" action="{{ route('leave.approve', $leaveApplication) }}">
                                @csrf
                                @method('put')
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Approve</button>
                            </form>
                            <form method="post" action="{{ route('leave.reject', $leaveApplication) }}">
                                @csrf
                                @method('put')
                                <button type="submit"
                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Reject</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
