<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        $user = User::firstOrNew(['email' => $request->email]);
        $user->email_verified_at = now();
        $user->name = Str::of($user->email)->before('@')->headline();
        $user->save();
        Auth::login($user);

        return redirect()->route('events.index');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }
}
