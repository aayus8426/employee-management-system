@extends('master')

@section('content')
<div class="ml-64 mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="px-6 py-4 ">
                <h1 class="text-2xl font-semibold mb-4">Record Attendance</h1>
            </div>
        </div>
        <div class="px-6 py-4">
                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 mb-4 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('attendance.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="date" class="block text-gray-700">Date:</label>
                        <input type="date" name="date" id="date" class="form-input mt-1 block w-full border-gray-300 rounded-md">
                    </div>

                    <table class="w-full table-auto ">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="px-4 py-2 text-center">EMPLOYEE ID</th>
                                <th class="px-4 py-2 text-center">EMPLOYEE NAME</th>
                                <th class="px-4 py-2 text-center">ATTENDANCE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td class="border px-4 py-2  text-center">{{ $employee->id }}</td>
                                <td class="border px-4 py-2 text-center">{{ $employee->name }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <select name="attendance[{{ $employee->id }}]" class="form-select border-gray-300 rounded-md">
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
