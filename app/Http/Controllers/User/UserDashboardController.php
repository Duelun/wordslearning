<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class UserDashboardController extends Controller
{

    public function learning(Request $request): RedirectResponse
    {
        return redirect('/dashboard')
            ->with('admin', false)
            ->with('page', 'learning');

    }

    public function dictionaries(Request $request): RedirectResponse
    {
        return redirect('/dashboard')
            ->with('admin', false)
            ->with('page', 'dictionaries');

    }

    public function settings(Request $request): RedirectResponse
    {
        return redirect('/dashboard')
            ->with('admin', false)
            ->with('page', 'settings')
            ->with('userstyle', $request->user()->webstyle)
            ->with('useropenpage', $request->user()->openpage)
            ->with('statonpage', $request->user()->statonpage)
            ->with('fullpagelearn', $request->user()->fullpagelearn);
    }

    public function help(Request $request): RedirectResponse
    {
        return redirect('/dashboard')
            ->with('admin', false)
            ->with('page', 'help');

    }
}
