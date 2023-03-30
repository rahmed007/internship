<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        
        $result = $employee->save();
        if ($result) {
            return redirect()->route('employees.index')->with('success', 'Data Inserted Successfully');
        }
        else
        {
            return redirect()->route('employees.index')->with('success', 'Unable to Save');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = Company::all();
        $employee = Employee::find($id);
        return view('employees.edit', compact('companies', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        
        $result = $employee->update();
        if ($result) {
            return redirect()->route('employees.index')->with('success', 'Data Updated Successfully');
        }
        else
        {
            return redirect()->route('employees.index')->with('success', 'Unable to Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $result = $employee->delete();
        if($result)
        {
            return redirect()->route('employees.index')->with('success', 'Record deleted Successfully');
        }
        else
        {
            return redirect()->route('employees.index')->with('success', 'Unable to Delete Record');
        }
    }
}
