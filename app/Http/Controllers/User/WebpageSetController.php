<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class WebpageSetController extends Controller
{
    public function change(Request $request): JsonResponse      //még csak másolat !!!!!!
    {
        //messages
        $errorno = __('Successfull');
        $erroryes = __('Not success');
        $custommessage = $erroryes;
        $customblock = array();
        $customblock['refreshpage'] = false;
        $array = array();

        $validator = Validator::make($request->all(), [
            'colorstyle' => ['nullable', Rule::in(['Default', 'Green', 'Yellow/Red'])],          //behúzni adatbázisba
            'sitelang' => ['nullable', 'exists:languages,nativename'],
            'openpage' => ['nullable', Rule::in(['Learning', 'Dictionaries', 'Settings', 'Help'])],     //------------
            'pagestatseen' => ['nullable'],
            'biglearnbox' => ['nullable'],
        ]);

        if (!$validator->fails()){
            if ($request->colorstyle != '') { $array['webstyle'] = $request->colorstyle; }
            if ($request->sitelang != '') {
                $array['weblang'] = DB::table('languages')->where('nativename', $request->sitelang)->value('iso1');
                if ($request->user()->weblang != $array['weblang']) { $customblock['refreshpage']  = true; }
            }
            if ($request->openpage != '') { $array['openpage'] = $request->openpage; }
            if ($request->has('pagestatseen')) { $array['statonpage'] = true; } else { $array['statonpage'] = false; }
            if ($request->has('biglearnbox'))  { $array['fullpagelearn'] = true; } else { $array['fullpagelearn'] = false; }

            foreach ($array as $key => $value){
                $request->user()->update( [$key => $value, ]);
            }
            $custommessage = $errorno;
        }

        return response()->json(['errormessage'=>$validator->messages(), 'custommessage'=>$custommessage, 'customblock'=>$customblock]);
    }
}
