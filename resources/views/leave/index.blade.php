@extends('master')

@section('content')
<div class="ml-64 mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="px-6 py-4 ">
                <h1 class="text-2xl font-semibold mb-4">Apply For Leave</h1>
            </div>
        </div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="overflow-x-auto">
            <form method="post" action="{{ route('leave.apply') }}" class="mt-4">
                @csrf
                <div class="mb-6">
                    <label for="leave_type" class="block text-gray-700">Leave Type:</label>
                    <input type="text" name="leave_type" class="form-input mt-1 block w-full rounded-md" required>
                </div>
                <div class="mb-6">
                    <label for="start_date" class="block text-gray-700">Start Date:</label>
                    <input type="date" name="start_date" class="form-input mt-1 block w-full rounded-md" required>
                </div>
                <div class="mb-6">
                    <label for="end_date" class="block text-gray-700">End Date:</label>
                    <input type="date" name="end_date" class="form-input mt-1 block w-full rounded-md" required>
                </div>
                <div class="mb-6">
                    <label for="reason" class="block text-gray-700">Reason:</label>
                    <textarea name="reason" class="form-textarea mt-1 block w-full rounded-md" rows="3" required></textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Apply</button>
            </form>
            </div>
        </div>
    </div>
</div>


@endsection
