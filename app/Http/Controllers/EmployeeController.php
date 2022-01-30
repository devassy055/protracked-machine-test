<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        

        $employees = Employee:: with('company')->paginate(10);
    
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::get();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'nullable',
            'email' => 'nullable|email',
            'phone'=>'nullable'
        ]);
        
        $employee = new employee();

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect()->route('employees.index')->with(['success' => 'Employee was added successfully']);
    }

    public function edit($id)
    {
        $employee = employee::findOrFail($id);
        $companies = Company::get();

        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'nullable|email',
            'phone'=>'nullable'
        ]);
        
        $employee = employee::findOrFail($id);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect()->route('employees.index')->with(['success' => 'Employee was added successfully']);
    }

    public function destroy($id)
    {
        $employee = employee::findOrFail($id)->delete();
        return redirect()->route('employees.index')->with(['success' => 'Employee was deleted successfully']);
    }

}
