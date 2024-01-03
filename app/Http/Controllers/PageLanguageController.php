<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageLanguageController extends Controller
{
    public function setlang(Request $request, string $flagcode): RedirectResponse
    {
        $langcode = DB::table('languages')->where('country', $flagcode)->value('iso1');
        if (!$langcode) { $langcode = 'en';}
        $request->session()->put('currentlang', $langcode);

        if (Auth::check()) {
            DB::table('users')->where('id', $request->user()->id)->update(['weblang' => $langcode]);
            return redirect('/dashboard')
                ->with('admin', false)
                ->with('page', 'learning'); //????
        } else {
            return redirect('/');
        }
    }

}
