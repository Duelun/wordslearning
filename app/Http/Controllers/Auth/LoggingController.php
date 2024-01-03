<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoggingController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('/')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('form', 'login');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        return redirect('/')
                ->withErrors(['password' => 'Not mach!',])
                ->onlyInput('email')
                ->with('form', 'login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
