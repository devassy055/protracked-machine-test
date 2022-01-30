<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|dimensions:width=100,height=100',
            'website' => 'nullable|url',
            'email' => 'nullable|email'
        ]);
        
        $company = new Company();

        // File upload
        if($request->logo){
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('images'), $imageName);
            $company->logo = $imageName;
        }
        $company->name = $request->name;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->save();

        return redirect()->route('companies.index')->with(['success' => 'Company was added successfully']);
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|dimensions:width=100,height=100',
            'website' => 'nullable|url',
            'email' => 'nullable|email'
        ]);
        
        $company = Company::findOrFail($id);

        // File upload
        if($request->logo){
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('images'), $imageName);
            $company->logo = $imageName;
        }
        $company->name = $request->name;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->save();

        return redirect()->route('companies.index')->with(['success' => 'Company was added successfully']);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id)->delete();
        return redirect()->route('companies.index')->with(['success' => 'Company was deleted successfully']);
    }
}
