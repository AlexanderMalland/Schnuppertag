@extends('layouts.app')

@section('content')
    <div class="create-job-container">
        <h1>Job bearbeiten</h1>

        <form method="POST" action="{{ route('jobs.update', $job->id) }}">
            @csrf
            @method('PUT')

            <!-- Job Title -->
            <label for="title">Job-Titel:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}" required>

            <!-- Job Description -->
            <label for="description">Beschreibung:</label>
            <textarea name="description" id="description" required>{{ old('description', $job->description) }}</textarea>

            <!-- Company Dropdown -->
            <label for="company_id">Unternehmen:</label>
            <select name="company_id" id="company_id" required>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $job->company_id == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>

            <!-- Category Dropdown -->
            <label for="category_id">Kategorie:</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $job->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Job aktualisieren</button>
        </form>
    </div>
@endsection