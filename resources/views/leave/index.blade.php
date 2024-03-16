@extends('master')

@section('content')
<div class="container mx-auto flex justify-center items-center h-full">
    <div class="w-full max-w-md">
    <h1 class="text-2xl font-semibold mb-4">Apply for Leave</h1>
        <form method="post" action="{{ route('leave.apply') }}" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="leave_type" class="block text-gray-700">Leave Type:</label>
                <input type="text" name="leave_type" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700">Start Date:</label>
                <input type="date" name="start_date" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700">End Date:</label>
                <input type="date" name="end_date" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="reason" class="block text-gray-700">Reason:</label>
                <textarea name="reason" class="form-textarea mt-1 block w-full" rows="3" required></textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Apply</button>
        </form>

        @if ($leaveApplications->count() > 0)
        <h2 class="mt-8 mb-4 text-lg font-semibold">Your Leave Applications</h2>
        <ul>
            @foreach ($leaveApplications as $leaveApplication)
            <li class="mb-2">{{ $leaveApplication->start_date }} to {{ $leaveApplication->end_date }} - {{ $leaveApplication->status }}</li>
            @endforeach
        </ul>
        @else
        <p class="mt-8">No leave applications found.</p>
        @endif
    </div>
</div>
@endsection
