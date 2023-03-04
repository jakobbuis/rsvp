<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $user = User::firstOrCreate(['email' => $request->email], ['email_verified_at' => now()]);
        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('global.message', 'Ingelogd');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }
}
