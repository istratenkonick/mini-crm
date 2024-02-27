<?php

namespace App\Http\Controllers;

use App\Http\Requests\{StoreCompanyRequest, UpdateCompanyRequest};
use App\Models\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $companies = Company::query()->orderBy('id', 'desc')->paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/companies_logos');

            $publicPath = str_replace('public', 'storage', $path);

            $data['logo'] = $publicPath;
        }

        Company::query()->create($data);

        return redirect()->route('companies.index')->with('success', 'Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $company = Company::query()->findOrFail($id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): View
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/companies_logos');
            $publicPath = str_replace('public', 'storage', $path);
            $data['logo'] = $publicPath;
        }

        $company->update($data);

        return redirect()->route('companies.index')->with('success', 'Company has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        if ($company->logo && file_exists(public_path($company->logo))) {
            unlink(public_path($company->logo));
        }

        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company has been deleted successfully');
    }
}
