<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $employees = Employee::all();
        return view('index', compact('companies', 'employees'));
    }
}
