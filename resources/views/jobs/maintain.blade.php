@extends('layouts.app')

@section('content')
<h1 style="text-align: center;">Jobs verwalten</h1>
<a href="{{ route('jobs.maintain') }}" class="btn">Neuen Job erstellen</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->title }}</td>
                <td>
                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn">Bearbeiten</a>
                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">Löschen</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
