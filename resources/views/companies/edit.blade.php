@extends('layouts.app')

@section('content')
    <div class="create-job-container">
        <h1>Unternehmen bearbeiten</h1>

        <form method="POST" action="{{ route('companies.update', $company->id) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $company->name) }}" required>

            <!-- Description
            <label for="description">Beschreibung:</label>
            <textarea name="description" id="description" required>{{ old('description', $company->description) }}</textarea>' -->

            <button type="submit">Unternehmen aktualisieren</button>
        </form>
    </div>
@endsection
