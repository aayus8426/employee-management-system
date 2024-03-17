@extends('master')

@section('content')
<div class="ml-64 mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="px-6 py-4 ">
                <h1 class="text-2xl font-semibold mb-4">My Leave Applications</h1>
            </div>
        </div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="overflow-x-auto">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Reason</th>
                        <th class="py-3 px-4 text-left">Start Date</th>
                        <th class="py-3 px-4 text-left">End Date</th>
                        <th class="py-3 px-4 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 ">
                    @forelse ($leaveApplications as $leaveApplication)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $leaveApplication->id }}</td>
                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $leaveApplication->name }}</td>
                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $leaveApplication->reason }}</td>
                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $leaveApplication->start_date}}</td>
                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $leaveApplication->end_date}}</td>
                        <td class="py-3 px-4 text-left whitespace-nowrap">{{ $leaveApplication->status}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="py-2 px-4 text-left whitespace-nowrap" colspan="6">No leave applications found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection
