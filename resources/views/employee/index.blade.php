@extends('master')
@section('content')


<div class="ml-64 mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="px-6 py-4 ">
                <h1 class="text-2xl font-semibold mb-4">List of employees</h1>
            </div>
        </div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead >
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th scope="col" class="px-6 py-3 text-left  uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left  uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left  uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left  uppercase tracking-wider">Phone</th>
                            <th scope="col" class="px-6 py-3 text-left  uppercase tracking-wider">Department</th>
                            <th scope="col" class="px-6 py-3 text-left  uppercase tracking-wider">Designation</th>
                            <th scope="col" class="px-6 py-3 text-left  uppercase tracking-wider">Salary</th>
                            <th scope="col" class="px-6 py-3 text-left  uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($employees as $employee)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->department }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->designation }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $employee->salary }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection