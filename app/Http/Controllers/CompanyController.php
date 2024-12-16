<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Zeigt alle Unternehmen an
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    // Zeigt das Formular zum Erstellen eines Unternehmens an
    public function create()
    {
        return view('companies.create');
    }

    // Speichert ein neues Unternehmen in der Datenbank
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Company::create($validated);

        return redirect()->route('companies.index');
    }

    // Zeigt das Formular zum Bearbeiten eines Unternehmens
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    // Aktualisiert ein bestehendes Unternehmen
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $company = Company::findOrFail($id);
        $company->update($validated);

        return redirect()->route('companies.index');
    }

    // Löscht ein Unternehmen
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index');
    }
}
