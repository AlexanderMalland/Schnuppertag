@extends('layouts.app')

@section('content')
    <!-- Job Create Container -->
    <div class="create-job-container" style="text-align: center; padding-top: 50px;">
        <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 20px;">
            Erstelle einen Job
        </h1>

        <form method="POST" action="{{ route('jobs.store') }}" style="max-width: 600px; margin: 0 auto;">
            @csrf

            <!-- Job Title -->
            <label for="title" style="font-size: 1.2rem;">Job-Titel:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required style="padding: 12px; width: 100%; margin-bottom: 20px;">

            <!-- Job Description -->
            <label for="description" style="font-size: 1.2rem;">Beschreibung:</label>
            <textarea name="description" id="description" required style="padding: 12px; width: 100%; margin-bottom: 20px;">{{ old('description') }}</textarea>

            <!-- Unternehmen (Textfeld) -->
            <label for="company_name" style="font-size: 1.2rem;">Unternehmen:</label>
            <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required style="padding: 12px; width: 100%; margin-bottom: 20px;">

            <!-- Kategorie (Textfeld) -->
            <label for="category_name" style="font-size: 1.2rem;">Kategorie:</label>
            <input type="text" name="category_name" id="category_name" value="{{ old('category_name') }}" required style="padding: 12px; width: 100%; margin-bottom: 20px;">

            <!-- Submit Button -->
            <button type="submit" style="background-color: #34495e; color: white; padding: 12px 20px; border-radius: 5px;">Job erstellen</button>
        </form>
    </div>
@endsection
