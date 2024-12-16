<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Zeigt alle Kategorien an
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Zeigt das Formular zum Erstellen einer Kategorie an
    public function create()
    {
        return view('categories.create');
    }

    // Speichert eine neue Kategorie in der Datenbank
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index');
    }

    // Zeigt das Formular zum Bearbeiten einer Kategorie
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Aktualisiert eine bestehende Kategorie
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);

        return redirect()->route('categories.index');
    }

    // Löscht eine Kategorie
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
