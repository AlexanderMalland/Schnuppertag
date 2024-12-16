@extends('layouts.app')

@section('content')
    <div class="create-job-container" style="text-align: center; padding-top: 50px;">
        <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 20px;">
            Erstelle ein Unternehmen
        </h1>

        <form method="POST" action="{{ route('companies.store') }}" style="max-width: 600px; margin: 0 auto;">
            @csrf

            <!-- Name -->
            <label for="name" style="font-size: 1.2rem;">Unternehmensname:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required style="padding: 12px; width: 100%; margin-bottom: 20px;">

            <!-- Beschreibung
            <label for="description" style="font-size: 1.2rem;">Beschreibung:</label>
            <textarea name="description" id="description" style="padding: 12px; width: 100%; margin-bottom: 20px;">{{ old('description') }}</textarea> -->

            <!-- Submit Button -->
            <button type="submit" style="background-color: #34495e; color: white; padding: 12px 20px; border-radius: 5px;">Unternehmen erstellen</button>
        </form>
    </div>
@endsection
