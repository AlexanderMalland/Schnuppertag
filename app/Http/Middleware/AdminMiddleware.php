<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Überprüfe, ob der Benutzer eingeloggt und ein Admin ist
        if (Auth::check() && Auth::user()->username === 'admin') {
            return $next($request); // Der Benutzer ist ein Admin, fahre fort
        }

        // Wenn der Benutzer nicht ein Admin ist, leite ihn zur Login-Seite weiter
        return redirect()->route('login');
    }
}
