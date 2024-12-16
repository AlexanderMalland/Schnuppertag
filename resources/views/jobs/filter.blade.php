@extends('layouts.app')

@section('title', 'Gefilterte Jobs')

@section('content')
<h1>Gefilterte Jobs</h1>
@if(request()->has('category'))
<p><strong>Kategorie:</strong> {{ $categories->find(request()->get('category'))->name }}</p>
@endif

@if(request()->has('company'))
<p><strong>Unternehmen:</strong> {{ $companies->find(request()->get('company'))->name }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Beschreibung</th>
            <th>Unternehmen</th>
            <th>Kategorie</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jobs as $job)
        <tr>
            <td>{{ $job->title }}</td>
            <td>{{ $job->description }}</td>
            <td>{{ $job->company->name }}</td>
            <td>{{ $job->category->name }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Keine Jobs für diesen Filter gefunden.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ url()->previous() }}" class="btn">Zurück</a>
@endsection