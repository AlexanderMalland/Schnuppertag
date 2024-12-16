@extends('layouts.app')

@section('title', 'Job Details')

@section('content')
<h1>Details für Job: {{ $job->title }}</h1>
<p><strong>Beschreibung:</strong> {{ $job->description }}</p>
<p><strong>Unternehmen:</strong> {{ $job->company->name }}</p>
<p><strong>Kategorie:</strong> {{ $job->category->name }}</p>
<a href="{{ route('jobs.index') }}" class="btn">Zurück zur Job-Liste</a>
@endsection