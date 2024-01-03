<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    
    public function settings(Request $request): RedirectResponse
    {
        return redirect('/dashboard')
            ->with('admin', true)
            ->with('page', 'settings');

    }

    public function words(Request $request): RedirectResponse
    {
        return redirect('/dashboard')
            ->with('admin', true)
            ->with('page', 'words');
        
    }

    public function users(Request $request): RedirectResponse
    {
        return redirect('/dashboard')
            ->with('admin', true)
            ->with('page', 'users');
        
    }

}
