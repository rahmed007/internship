<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;

        if ($request->hasFile('logo')) {
            $imageName = time().'.'.$request->file('logo')->getClientOriginalExtension(); 
            $request->file('logo')->storeAs('public', $imageName);
            $company->logo = $imageName;
        }
        
        $result = $company->save();
        if ($result) {
            return redirect()->route('companies.index')->with('success', 'Data Inserted Successfully');
        }
        else
        {
            return redirect()->route('companies.index')->with('success', 'Unable to Save');
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
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;

        if ($request->hasFile('logo')) {

            $imageName = time().'.'.$request->file('logo')->getClientOriginalExtension(); 
            $request->file('logo')->storeAs('public', $imageName);
            $company->logo = $imageName;
        }
        $result = $company->update();
        if ($result) {
            return redirect()->route('companies.index')->with('success', 'Data Updated Successfully');
        }
        else
        {
            return redirect()->route('companies.index')->with('success', 'Unable to Update');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        $result = $company->delete();
        if($result)
        {
            return redirect()->route('companies.index')->with('success', 'Record deleted Successfully');
        }
        else
        {
            return redirect()->route('companies.index')->with('success', 'Unable to Delete Record');
        }
    }
}
