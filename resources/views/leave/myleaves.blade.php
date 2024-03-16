@extends('master')

@section('content')
    <div class="container mx-auto">
        <div class="overflow-x-auto">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Reason</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse ($leaveApplications as $leaveApplication)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $leaveApplication->id }}</td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $leaveApplication->name }}</td>
                                <td class="py-3 px-6 text-left">{{ $leaveApplication->reason }}</td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $leaveApplication->status}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="py-3 px-6 text-left whitespace-nowrap" colspan="2">No leave applications found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
