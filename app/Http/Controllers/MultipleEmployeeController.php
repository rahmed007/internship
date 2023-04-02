<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use Carbon\Carbon;

class MultipleEmployeeController extends Controller
{
    public function create_multiple()
    {
        $companies = Company::all();
        return view('employees.create_multiple', compact('companies'));
    }

    public function store_multiple(Request $request)
    {
        $request->validate([
            'first_name.*' => 'required',
            'last_name.*' => 'required',
        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $company_id = $request->company_id;
        $email = $request->email;
        $phone = $request->phone;

        for ($i=0; $i < count($first_name) ; $i++) { 
            $datasave[] =[
                'first_name' => $first_name[$i],
                'last_name' => $last_name[$i],
                'company_id' => $company_id[$i],
                'email' => $email[$i],
                'phone' => $phone[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
            $result = Employee::insert($datasave);
            if($result)
            {
                return redirect()->route('employees.index')->with('success', 'Data Inserted Successfully');
            }
            else
            {
                return redirect()->route('employees.index')->with('success', 'Unable to Save');
            }
        
    }
}
