<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();

        return view('leaves.index', compact('leaves'));
    }

    public function create($employee_id)
    {
        return view('leaves.create', compact('employee_id'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'employee_id' => 'required',
    //         'leave_reason' => 'required',
    //         'start_date' => 'required|date',
    //         'end_date' => 'required|date',
    //     ]);

    //     Leave::create($request->all());

    //     return redirect()->route('employees.show', ['employee' => $request->employee_id])
    //     ->with('success', 'Leave created successfully.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'leave_reason' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $employee = Employee::findOrFail($request->employee_id);
        $leaveCount = $employee->leaves()->count();

        if ($leaveCount >= 5) {
            return redirect()->route('employees.show', ['employee' => $request->employee_id])
                ->with('error', 'Maximum limit of 5 leaves reached for this employee.');
        }

        Leave::create($request->all());

        return redirect()->route('employees.show', ['employee' => $request->employee_id])
            ->with('success', 'Leave created successfully.');
    }


    public function show(Leave $leave)
    {
        return view('leaves.show', compact('leave'));
    }

    public function edit(Leave $leave)
    {
        return view('leaves.edit', compact('leave'));
    }

    public function update(Request $request, Leave $leave)
    {
        $request->validate([
            'leave_reason' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $leave->update($request->all());
        $employee_id = $leave->employee_id;
        
        return redirect()->route('employees.show', ['employee' => $employee_id])
        ->with('success', 'Leave updated successfully.');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect()->route('employees.show', ['employee' => $leave->employee_id])
            ->with('success', 'Leave deleted successfully.');
    }
}
