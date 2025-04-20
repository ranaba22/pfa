<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Departement;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // List all employees
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Show details of a specific employee
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    // Show form to create a new employee
    public function create()
    {
        $departements = Departement::all(); // Fetch all departments for the dropdown
        return view('employees.create', compact('departements'));
    }

    // Store a new employee in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'num_tel' => 'required|digits_between:8,15',
            'adresse' => 'required|string|max:255',
            'id_departement' => 'required|exists:departements,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('employees', 'public');
        }
        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    // Show form to edit an existing employee
    public function edit(Employee $employee)
    {
        $departements = Departement::all(); // Fetch all departments for the dropdown
        return view('employees.edit', compact('employee', 'departements'));
    }

    // Update an existing employee in the database
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'num_tel' => 'required|digits_between:8,15',
            'adresse' => 'required|string|max:255',
            'id_departement' => 'required|exists:departements,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('employees', 'public');
        }

        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    // Delete an employee from the database
    public function destroy(Employee $employee)
    {
        if ($employee->image) {
            \Storage::delete('public/' . $employee->image);
        }

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
