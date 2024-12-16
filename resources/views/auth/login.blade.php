@extends('layouts.app')

@section('content')
<div style="max-width: 400px; margin: 50px auto;">
    <h2 style="text-align: center;">Login</h2>
    @if ($errors->any())
        <div style="color: red;">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label>Benutzername</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Passwort</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
@endsection
