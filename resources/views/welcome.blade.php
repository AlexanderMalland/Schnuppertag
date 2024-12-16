@extends('layouts.app')

@section('content')
    <!-- Willkommen Container -->
    <div class="welcome-container" style="text-align: center; padding-top: 50px;">
        <!-- Willkommen Überschrift -->
        <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 20px;">
            Willkommen beim Job Management System!
        </h1>
        
        <!-- Untertitel -->
        <p style="font-size: 1.5rem; font-weight: 300; margin-bottom: 40px;">
            Verwalte deine Jobs einfach und effizient.
        </p>

        <!-- Menü mit den Funktionen -->
        <div class="menu-container" style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; font-size: 1.2rem; margin-top: 30px;">
            <div style="background-color: #34495e; padding: 20px; border-radius: 10px; color: white; width: 200px; text-align: center;">
                <a href="{{ route('jobs.index') }}" style="text-decoration: none; color: white; font-weight: bold;">
                    Job-Liste
                </a>
            </div>
            <div style="background-color: #34495e; padding: 20px; border-radius: 10px; color: white; width: 200px; text-align: center;">
                <a href="{{ route('jobs.create') }}" style="text-decoration: none; color: white; font-weight: bold;">
                    Jobs erstellen
                </a>
            </div>
            <div style="background-color: #34495e; padding: 20px; border-radius: 10px; color: white; width: 200px; text-align: center;">
                <a href="{{ route('jobs.maintain') }}" style="text-decoration: none; color: white; font-weight: bold;">
                    Job Verwalten
                </a>
            </div>

        </div>
    </div>
@endsection
