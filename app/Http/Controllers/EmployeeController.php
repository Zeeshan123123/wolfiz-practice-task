<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    // display listing
    public function index()
    {
        return view('crm.employees.index', [
            'employees' => Employee::latest()->paginate(5)->withQueryString()
        ]);
    }
    
    // display form for creating new resource
    public function create()
    {
        return view('crm.employees.create', [
            'companies' => Company::all()
        ]);
    }
    
    // store resource
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'company' => ['required']
        ]);

        Employee::create(
            [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'company_id' => $request->input('company'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'status' => $request->input('status'),
            ]
        );
        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }
    
    // display specific resource details
    public function show(Employee $employee)
    {
        return view('crm.employees.show', [
            'employee' => $employee
        ]);
    }
    
    // display form for editing the specified resource
    public function edit(Employee $employee)
    {
        return view('crm.employees.edit', [
            'employee' => $employee,
            'companies' => Company::all()
        ]);
    }
    
    // update the specified resource
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'company' => ['required']
        ]);
        $employee->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company_id' => $request->input('company'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }
    
    // remove the specified resource
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
