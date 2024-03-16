@extends('master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Employee Attendance</title>
    <!-- Include Tailwind CSS stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full md:w-3/4 lg:w-1/2">
            <div class="bg-white shadow-md rounded-md">
                <div class="px-6 py-4 border-b border-gray-300">
                <h1 class="text-2xl font-semibold mb-4">Record Attendance</h1>
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

                        <table class="w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Employee ID</th>
                                    <th class="px-4 py-2">Employee Name</th>
                                    <th class="px-4 py-2">Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $employee->id }}</td>
                                        <td class="border px-4 py-2">{{ $employee->name }}</td>
                                        <td class="border px-4 py-2">
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
</div>
</body>
</html>

@endsection
