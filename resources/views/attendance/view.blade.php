@extends('master')

@section('content')
<div class="ml-64 mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="px-6 py-4 ">
                <h1 class="text-2xl font-semibold mb-4">Show Attendance</h1>
            </div>
        </div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="overflow-x-auto">
            <form method="GET" action="{{ route('attendance.show') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="date" class="block text-gray-700">Select Date:</label>
                                <input type="date" name="date" id="date" class="form-input mt-1 block w-full ">
                            </div>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" >Show Attendance</button>
                        </form>
                        <table class="table-auto w-full mt-4">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="px-3 py-4 text-center">Employee ID</th>
                                    <th class="px-3 py-4 text-center">Employee Name</th>
                                    <th class="px-3 py-4 text-center">Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                <tr>
                                    <td class="border px-3 py-4 text-center">{{ $employee->id }}</td>
                                    <td class="border px-3 py-4 text-center">{{ $employee->name }}</td>
                                    <td class="border px-3 py-4 text-center">
                                        @if($employee->attendances->isNotEmpty())
                                        {{ $employee->attendances->first()->status }}
                                        @else
                                        No attendance record found
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="border px-4 py-2" colspan="3">No employees found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>

@endsection
