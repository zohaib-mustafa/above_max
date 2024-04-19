<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;

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
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);
        if ($validator->fails()) {
            return Redirect()->back()->with('error', $validator->errors());
        } 
         $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = basename($logoPath);
        }
        $company->website = $request->website;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    
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
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
       $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);
        if ($validator->fails()) {
            return Redirect()->back()->with('error', $validator->errors());
        } 
        $company->name = $request->name;
        $company->email = $request->email;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = basename($logoPath);
        }
        $company->website = $request->website;
        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
