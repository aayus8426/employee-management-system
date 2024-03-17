@extends('master')

@section('content')
<div class="ml-64 mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-semibold mb-4">Leave Settings</h1>
            </div>
        </div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="overflow-x-auto">
                @if ($errors->any())
                    <div class="mb-4">
                        <strong class="text-red-500">Error:</strong>
                        <ul class="list-disc list-inside text-red-500">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('settings.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="working_days_required" class="block text-gray-700 font-bold mb-2">Working Days Required:</label>
                        <input type="number" name="working_days_required" id="working_days_required" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('working_days_required', $settings->working_days_required ?? '') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="leave_earned_per_period" class="block text-gray-700 font-bold mb-2">Leave Earned Per Period:</label>
                        <input type="number" name="leave_earned_per_period" id="leave_earned_per_period" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('leave_earned_per_period', $settings->leave_earned_per_period ?? '') }}" required>
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Settings</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
