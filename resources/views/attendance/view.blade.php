@extends('master')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full md:w-3/4 lg:w-1/2">
            <div class="bg-white shadow-md rounded-md">
            <div class="px-6 py-4  border-b border-gray-300">
                <h1 class="text-2xl font-semibold mb-4">Show Attendance</h1>
                </div>
                <div class="px-6 py-4 border-b border-gray-300">
                    Attendance for {{ $selectedDate }}
                </div>

                <div class="px-6 py-4">
                    <div class="overflow-x-auto">
                        <form method="GET" action="{{ route('attendance.show') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="date" class="block text-gray-700">Select Date:</label>
                                <input type="date" name="date" id="date" class="form-input mt-1 block w-full">
                            </div>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Show Attendance</button>
                        </form>
                        <table class="table-auto w-full mt-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Employee ID</th>
                                    <th class="px-4 py-2">Employee Name</th>
                                    <th class="px-4 py-2">Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                <tr>
                                    <td class="border px-4 py-2">{{ $employee->id }}</td>
                                    <td class="border px-4 py-2">{{ $employee->name }}</td>
                                    <td class="border px-4 py-2">
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
    </div>
</div>
@endsection
