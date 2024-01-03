<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $currentlang = $request->user()->weblang;
            $userlang = DB::table('languages')->where('iso1', $currentlang)->value('nativename');
            $request->session()->put('userlangtext', ucfirst($userlang));
        } else {
            $currentlang = $request->session()->get('currentlang', 'en');
        }
        if ($currentlang == '') { $currentlang = 'en'; }
        $request->session()->put('currentlang', $currentlang);
        App::setLocale($currentlang);

        $flag = DB::table('languages')->where('iso1', $currentlang)->value('country');
        $request->session()->put('currentflag', $flag);

        $langs = DB::table('languages')->where('active', true)->get();
        $activelangs = array();
        $activelangsiso = array();
        $activeflags = array();
        foreach ($langs as $lang) {
            $activelangs[] = ucfirst($lang->nativename);
            $activelangsiso[] = $lang->iso1;
            $activeflags[] = $lang->country;
        }
        $request->session()->put('activelangs', $activelangs);
        $request->session()->put('activelangsiso', $activelangsiso);
        $request->session()->put('activeflags', $activeflags);

        return $next($request);
    }
}
