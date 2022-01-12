<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;


class CompanyController extends Controller
{
    // display listing
    public function index()
    {
        return view('crm.companies.index', [
            'companies' => Company::where('status', '=', 'active')->latest()->paginate(20)->withQueryString()
        ]);

        /*return response()->json( ['status' => 'success', 'companies' => Company::latest()->get()], 200 );*/
    }
    
    // display form for creating new resource
    public function create()
    {
        return view('crm.companies.create');
    }
    
    // store resource
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'logo' => ['dimensions:min_width=100,min_height=100']
        ]);
        

        Company::create([
            'logo' => uploadImage($request->logo),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('companies.index')->with('success', 'Congrats! Company has been successfully added.');
    }
    
    // display specific resource details
    public function show(Company $company)
    {
        return view('crm.companies.show', [
           'company' => $company,
           'active_employees_today' => Company::with(['activeEmployeesToday'])->get(),
           'active_employees_this_week' => Company::with(['activeEmployeesThisWeek'])->get()
        ]);
    }
    
    // display form for editing the specified resource
    public function edit(Company $company)
    {
        return view('crm.companies.edit', [
            'company' => $company
        ]);
    }
    
    // update the specified resource
    public function update(Request $request, Company $company)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'logo' => ['dimensions:min_width=100,min_height=100']
        ]);
        
        if ( $request->logo ) {
            $logo = $request->logo;
        }

        $company->update([
            'logo' => ( isset($logo) ) ? uploadImage($logo) : $company->logo,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('companies.index')->with('success', 'Congrats! Company has been successfully updated.');
    }
    
    // remove the specified resource
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company Deleted Successfully');
    }

}
