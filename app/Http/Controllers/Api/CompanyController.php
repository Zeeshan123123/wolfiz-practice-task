<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller
{
    
    // display listing
    public function index()
    {
        return response()->json( ['status' => 'success', 'companies' => Company::latest()->get()], 200 );
    }
    
    
    // display specific resource details
    public function show(Company $company)
    {
        return response()->json( [
            'status' => 'success', 
            'company' => $company,
           'active_employees_today' => Company::with(['activeEmployeesToday'])->get(),
           'active_employees_this_week' => Company::with(['activeEmployeesThisWeek'])->get()
        ], 200 );
    }
    
}
