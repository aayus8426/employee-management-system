@extends('master')

@section('content')
<div class="ml-64 mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="px-6 py-4 ">
                <h1 class="text-2xl font-semibold mb-4">My Profile</h1>
            </div>
        </div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="overflow-x-auto">
            <div>
                            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
                        </div>
                        @if(Auth::user()->employee)
                            <div>
                                <p><strong>Employee ID:</strong> {{ Auth::user()->employee->id }}</p>
                                <p><strong>Phone:</strong> {{ Auth::user()->employee->phone }}</p>
                                <p><strong>Department:</strong> {{ Auth::user()->employee->department }}</p>
                                <p><strong>Designation:</strong> {{ Auth::user()->employee->designation }}</p>
                                <p><strong>Salary:</strong> {{ Auth::user()->employee->salary }}</p>
                                
                                <!-- Add other employee details here -->
                            </div>
                        @endif
                        
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
