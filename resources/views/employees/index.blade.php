<!-- resources/views/employees/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Employee List</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Sex</th>
                    <th>Number of Leaves</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone_number }}</td>
                        <td>{{ $employee->sex }}</td>
                        <td>{{ $employee->leaves->count() }}</td>
                        <td>
                            <a href="{{ route('employees.show', $employee) }}" class="btn btn-info">Leaves Data</a>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
    </div>
@endsection
