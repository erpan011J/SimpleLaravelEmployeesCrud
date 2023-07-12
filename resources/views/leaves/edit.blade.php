<!-- resources/views/leaves/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Leave</h2>

        <form action="{{ route('leaves.update', $leave) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="leave_reason">Leave Reason:</label>
                <input type="text" name="leave_reason" class="form-control" value="{{ $leave->leave_reason }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control" value="{{ $leave->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" class="form-control" value="{{ $leave->end_date }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
