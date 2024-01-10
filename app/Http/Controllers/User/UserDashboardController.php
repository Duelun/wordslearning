<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        $fulllanglist = array();
        $langs = DB::table('languages')->whereNot('iso1', NULL)->get();
        foreach ($langs as $lang) {
            $fulllanglist[$lang->iso1] = ucfirst($lang->nativename);
        }
        $usernative = DB::table('languages')->where('iso1', $request->user()->ownlang)->value('nativename');
        $userlearn = DB::table('languages')->where('iso1', $request->user()->learnedlang)->value('nativename');

        $userdictionaries = array();
        $userdicts = DB::table('userbooks')->where('user', $request->user()->id)->get();

        foreach ($userdicts as $ud){
            $wordsin = DB::table('userwords')->where('user', $request->user()->id)->where('book', $ud->id)->value('word');
            if ($wordsin == null) { $number = 0; } else { $number = sizeof($wordsin); }

            $record = array();
            $record['id'] = $ud->id;
            $record['name'] = $ud->name;
            $record['langown'] = ucfirst(DB::table('languages')->where('iso1', $ud->langown)->value('nativename'));
            $record['langforeign'] = ucfirst(DB::table('languages')->where('iso1', $ud->langforeign)->value('nativename'));
            $record['number'] = $number;
            $userdictionaries[] = $record;
        }

        return redirect('/dashboard')
            ->with('admin', false)
            ->with('page', 'dictionaries')
            ->with('usernative', ucfirst($usernative))
            ->with('userlearn', ucfirst($userlearn))
            ->with('userdictionaries', $userdictionaries)
            ->with('fulllanglist', $fulllanglist);
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

    public function documents(Request $request): RedirectResponse
    {
        return redirect('/dashboard')
            ->with('admin', false)
            ->with('page', 'documents');

    }
}
