<!-- resources/views/leaves/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Leave</h2>

        <form action="{{ route('leaves.store') }}" method="POST">
            @csrf

            <input type="hidden" name="employee_id" value="{{ $employee_id }}">


            <div class="form-group">
                <label for="leave_reason">Leave Reason:</label>
                <input type="text" name="leave_reason" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control" min="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
