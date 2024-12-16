<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Zeigt alle Jobs sowie Unternehmen und Kategorien an.
     */
    public function index()
    {
        $jobs = Job::all();
        $companies = Company::all();
        $categories = Category::all();

        return view('jobs.index', compact('jobs', 'companies', 'categories'));
    }

    /**
     * Zeigt die Details für einen spezifischen Job.
     */
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    /**
     * Zeigt das Formular zum Erstellen eines neuen Jobs an.
     */
    public function create()
    {
        $companies = Company::all();
        $categories = Category::all();

        return view('jobs.create', compact('companies', 'categories'));
    }

    /**
     * Speichert einen neuen Job in der Datenbank.
     */
    public function store(Request $request)
    {
        // Validierung der Formulardaten
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',  // Neues Textfeld für Unternehmen
            'category_name' => 'required|string|max:255', // Neues Textfeld für Kategorie
        ]);

        // Überprüfen, ob das Unternehmen bereits existiert, andernfalls wird es erstellt
        $company = Company::firstOrCreate([
            'name' => $validated['company_name'],
        ]);

        // Überprüfen, ob die Kategorie bereits existiert, andernfalls wird sie erstellt
        $category = Category::firstOrCreate([
            'name' => $validated['category_name'],
        ]);

        // Job speichern und mit dem jeweiligen Unternehmen und der Kategorie verknüpfen
        Job::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'company_id' => $company->id,
            'category_id' => $category->id,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job wurde erfolgreich erstellt!');
    }

    /**
     * Zeigt das Formular zum Bearbeiten eines bestehenden Jobs an.
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $companies = Company::all();
        $categories = Category::all();

        return view('jobs.edit', compact('job', 'companies', 'categories'));
    }

    /**
     * Aktualisiert einen bestehenden Job in der Datenbank.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $job = Job::findOrFail($id);
        $job->update($validated);

        return redirect()->route('jobs.index')->with('success', 'Job wurde erfolgreich aktualisiert!');
    }

    /**
     * Löscht einen Job aus der Datenbank.
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job wurde erfolgreich gelöscht!');
    }

    /**
     * Filtert Jobs nach Kategorie oder Unternehmen.
     */
    public function filterJobs(Request $request)
    {
        $query = Job::query();

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('company')) {
            $query->where('company_id', $request->company);
        }

        $jobs = $query->get();
        $companies = Company::all();
        $categories = Category::all();

        return view('jobs.index', compact('jobs', 'companies', 'categories'));
    }
    public function maintain()
{
    $jobs = Job::all();
    return view('jobs.maintain', compact('jobs'));
}

}
