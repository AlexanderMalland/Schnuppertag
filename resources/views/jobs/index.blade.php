@extends('layouts.app')

@section('title', 'Jobs Übersicht')

@section('content')
<h1>Jobs Übersicht</h1>
<div>
    <label for="table-select" style="font-weight: bold;">Tabelle auswählen:</label>
    <select id="table-select" onchange="switchTable()" style="padding: 10px; font-size: 1rem;">
        <option value="jobs">Jobs</option>
        <option value="companies">Unternehmen</option>
        <option value="categories">Kategorien</option>
    </select>
</div>

<!-- Kategorien-Tabelle -->
<table id="categories-table" style="display: none;">
    <thead>
        <tr>
            <th>Kategorie</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>
                <a href="{{ route('jobs.filter', ['category' => $category->id]) }}" class="btn">
                    {{ $category->name }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Unternehmen-Tabelle -->
<table id="companies-table" style="display: none;">
    <thead>
        <tr>
            <th>Unternehmen</th>
            <th>Beschreibung</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr>
            <td>
                <a href="{{ route('jobs.filter', ['company' => $company->id]) }}" class="btn">
                    {{ $company->name }}
                </a>
            </td>
            <td>{{ $company->description }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Jobs-Tabelle -->
<table id="jobs-table">
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
            <td colspan="4">Keine Jobs gefunden.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<script>
    function switchTable() {
        document.getElementById('jobs-table').style.display = 'none';
        document.getElementById('companies-table').style.display = 'none';
        document.getElementById('categories-table').style.display = 'none';

        const selectedTable = document.getElementById('table-select').value;
        document.getElementById(selectedTable + '-table').style.display = 'table';
    }
</script>
@endsection