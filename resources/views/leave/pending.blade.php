@extends('master')
@section('content')
<div class="ml-64 mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="px-6 py-4 ">
                <h1 class="text-2xl font-semibold mb-4">Pending Leave Requests</h1>
            </div>
        </div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="overflow-x-auto">
            @if ($leaveApplications->isEmpty())
         
            @else
            <table class="table-auto w-full">
            <h1 class="text-2xl font-semibold mb-4"></h1>
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="px-4 py-2 text-center">Employee Id</th>
                    <th class="px-4 py-2 text-center">Name</th>
                        <th class="px-4 py-2 text-center">Leave Type</th>
                        <th class="px-4 py-2 text-center">Start Date</th>
                        <th class="px-4 py-2 text-center">End Date</th>
                        <th class="px-4 py-2 text-center">Reason</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveApplications as $leaveApplication)
                    <tr class="border-b border-gray-200">
                    <td class="px-4 py-2 text-center">{{ $leaveApplication->employee_id }}</td>
                    <td class="px-4 py-2 text-center">{{ $leaveApplication->name}}</td>
                        <td class="px-4 py-2 text-center">{{ $leaveApplication->leave_type }}</td>
                        <td class="px-4 py-2 text-center">{{ $leaveApplication->start_date }}</td>
                        <td class="px-4 py-2 text-center">{{ $leaveApplication->end_date }}</td>
                        <td class="px-4 py-2 text-center">{{ $leaveApplication->reason }}</td>
                        <td class="px-4 py-2 text-center flex space-x-2">
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection