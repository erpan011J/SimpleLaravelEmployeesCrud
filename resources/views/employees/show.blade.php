<!-- resources/views/employees/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Employee Details</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <a style="margin-bottom:10px" href="{{ route('employees.index') }}" class="btn btn-primary">Back to List</a>

        <table class="table table-bordered">
            <tr>
                <th>First Name:</th>
                <td>{{ $employee->first_name }}</td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td>{{ $employee->last_name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $employee->email }}</td>
            </tr>
            <tr>
                <th>Phone Number:</th>
                <td>{{ $employee->phone_number }}</td>
            </tr>
            <tr>
                <th>Sex:</th>
                <td>{{ $employee->sex }}</td>
            </tr>
        </table>
        <h3>Leave Data</h3>

        <a style="margin-bottom:10px" id="add-leave-btn" href="{{ route('leaves.create', $employee->id) }}"
            class="btn btn-success @if ($employee->leaves->count() >= 5) disabled-link @endif"
            @if ($employee->leaves->count() >= 5) style="pointer-events: none; opacity: 0.6; cursor: not-allowed;" @endif>Add
            Leave</a>


        @if ($employee->leaves->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Leave Reason</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee->leaves as $leave)
                        <tr>
                            <td>{{ $leave->leave_reason }}</td>
                            <td>{{ $leave->start_date }}</td>
                            <td>{{ $leave->end_date }}</td>
                            <td>
                                <a href="{{ route('leaves.edit', ['leave' => $leave->id]) }}"
                                    class="btn btn-primary">Edit</a>
                                <form action="{{ route('leaves.destroy', ['leave' => $leave->id]) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this leave?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No leave data available for this employee.</p>
        @endif
    </div>
    <script>
        const disabledLinks = document.getElementsByClassName('disabled-link');
        for (let i = 0; i < disabledLinks.length; i++) {
            disabledLinks[i].addEventListener('click', function(event) {
                event.preventDefault();
            });
        }
        var addButton = document.getElementById("add-leave-btn");
        var leavesCount = {{ $employee->leaves->count() }};

        if (leavesCount >= 5) {
            addButton.style.pointerEvents = "none";
            addButton.style.opacity = "0.6";
            addButton.style.cursor = "not-allowed";
        }
    </script>
@endsection
