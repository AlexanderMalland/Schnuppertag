@extends('layouts.app')

@section('content')
    <!-- Job-Liste Container -->
    <div class="welcome-container" style="text-align: center; padding-top: 50px;">
        <!-- Überschrift -->
        <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 20px;">Job-Liste</h1>

        <!-- Dropdown zum Umschalten zwischen Tabellen -->
        <div style="margin-bottom: 20px;">
            <label for="table-select" style="font-size: 1.2rem; font-weight: bold;">Tabelle auswählen:</label>
            <select id="table-select" onchange="switchTable()" style="padding: 10px; font-size: 1rem;">
                <option value="jobs" selected>Jobs</option>
                <option value="companies">Unternehmen</option>
                <option value="categories">Kategorien</option>
            </select>
        </div>

        <!-- Dynamische Tabelle -->
        <div id="table-container">
            <!-- Tabelle für Jobs -->
            <table id="jobs-table" style="width: 80%; margin: 0 auto; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <thead style="background-color: #34495e; color: white;">
                    <tr>
                        <th style="padding: 15px; border: 1px solid #ddd;">Titel</th>
                        <th style="padding: 15px; border: 1px solid #ddd;">Beschreibung</th>
                        <th style="padding: 15px; border: 1px solid #ddd;">Unternehmen</th>
                        <th style="padding: 15px; border: 1px solid #ddd;">Kategorie</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                        <tr>
                            <td style="padding: 15px; border: 1px solid #ddd;">{{ $job->title }}</td>
                            <td style="padding: 15px; border: 1px solid #ddd;">{{ $job->description }}</td>
                            <td style="padding: 15px; border: 1px solid #ddd;">{{ $job->company->name }}</td>
                            <td style="padding: 15px; border: 1px solid #ddd;">{{ $job->category->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 15px; border: 1px solid #ddd; text-align: center;">Keine Jobs gefunden.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Tabelle für Unternehmen -->
            <table id="companies-table" style="display: none; width: 80%; margin: 0 auto; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <thead style="background-color: #34495e; color: white;">
                    <tr>
                        <th style="padding: 15px; border: 1px solid #ddd;">Name</th>
                        <th style="padding: 15px; border: 1px solid #ddd;">Beschreibung</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td style="padding: 15px; border: 1px solid #ddd;">{{ $company->name }}</td>
                            <td style="padding: 15px; border: 1px solid #ddd;">{{ $company->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tabelle für Kategorien -->
            <table id="categories-table" style="display: none; width: 80%; margin: 0 auto; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <thead style="background-color: #34495e; color: white;">
                    <tr>
                        <th style="padding: 15px; border: 1px solid #ddd;">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td style="padding: 15px; border: 1px solid #ddd;">{{ $category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function switchTable() {
            const selectedTable = document.getElementById('table-select').value;

            document.getElementById('jobs-table').style.display = selectedTable === 'jobs' ? 'table' : 'none';
            document.getElementById('companies-table').style.display = selectedTable === 'companies' ? 'table' : 'none';
            document.getElementById('categories-table').style.display = selectedTable === 'categories' ? 'table' : 'none';
        }
    </script>
@endsection
