@extends('layouts.app')

@section('content')
    <div class="create-job-container">
        <h1>Kategorie bearbeiten</h1>

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>

            <button type="submit">Kategorie aktualisieren</button>
        </form>
    </div>
@endsection
