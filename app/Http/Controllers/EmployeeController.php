<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Display a listing of the employees
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Show the form for creating a new employee
    public function create()
    {
        return view('employees.create');
    }

    // Store a newly created employee in the database
    public function store(Request $request)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
        ]);

        Employee::create([
            'employee_name' => $request->employee_name,
            'position' => $request->position,
            'salary' => $request->salary,
            'hire_date' => $request->hire_date,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
    }

    // Show the form for editing the specified employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    // Update the specified employee in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update([
            'employee_name' => $request->employee_name,
            'position' => $request->position,
            'salary' => $request->salary,
            'hire_date' => $request->hire_date,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    // Remove the specified employee from the database
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
