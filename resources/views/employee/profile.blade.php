@extends('master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <div>
                            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        </div>
                        @if(Auth::user()->employee)
                            <div>
                                <p><strong>Employee ID:</strong> {{ Auth::user()->employee->id }}</p>
                                <p><strong>Department:</strong> {{ Auth::user()->employee->department }}</p>
                                <!-- Add other employee details here -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
