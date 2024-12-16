@extends('layouts.app')

@section('content')
    <div class="welcome-container">
        <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 20px;">Unternehmen Liste</h1>

        <!-- Tabelle für Unternehmen -->
        <table style="width: 80%; margin: 0 auto; border-collapse: collapse; background-color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <thead style="background-color: #34495e; color: white;">
                <tr>
                    <th style="padding: 15px; border: 1px solid #ddd;">Name</th>
                    <!-- <th style="padding: 15px; border: 1px solid #ddd;">Beschreibung</th> -->
                    <th style="padding: 15px; border: 1px solid #ddd;">Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td style="padding: 15px; border: 1px solid #ddd;">{{ $company->name }}</td>
                        <!-- <td style="padding: 15px; border: 1px solid #ddd;">{{ $company->description }}</td> -->
                        <td style="padding: 15px; border: 1px solid #ddd;">
                            <a href="{{ route('companies.show', $company->id) }}" style="text-decoration: none; color: #34495e;">Details</a> | 
                            <a href="{{ route('companies.edit', $company->id) }}" style="text-decoration: none; color: #34495e;">Bearbeiten</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
