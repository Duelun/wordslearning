<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SetDictionariesController extends Controller
{
    public function dictlist(Request $request): JsonResponse
    {
        //messages
        $errorno = __('Successfull');
        $erroryes = __('Not success');
        $custommessage = $erroryes;
        $customblock = array();
        $customblock['insertNewDict'] = false;
        $array = array();

        $validator = Validator::make($request->all(), [
            'newname' => ['string', 'min:3', Rule::unique('userbooks', 'name')->where('user', $request->user()->id)],
            'ownlang' => ['string', 'exists:languages,nativename'],
            'learnlang' => ['string', 'exists:languages,nativename'],
        ]);

        if (!$validator->fails()){
            //refresh user dict languages
            $array['ownlang'] = DB::table('languages')->where('nativename', $request->ownlang)->value('iso1');
            $array['learnedlang'] = DB::table('languages')->where('nativename', $request->learnlang)->value('iso1');
            foreach ($array as $key => $value){
                $request->user()->update( [$key => $value, ]);
            }

            //user dict basic details
            $array1 = array();
            $array1['user'] = $request->user()->id;
            $array1['name'] = $request->newname;
            $array1['langforeign'] = $array['learnedlang'];
            $array1['langown'] = $array['ownlang'];
            $array1['created_at'] = now();

            $request->id = DB::table('userbooks')->insertGetId($array1);

            $customblock['insertNewDict'] = true;
            $customblock['id'] = $request->id;
            $customblock['name'] = $request->newname;
            $customblock['ownlang'] = $request->ownlang;
            $customblock['learnlang'] = $request->learnlang;
            $custommessage = $errorno;
        }

        return response()->json(['errormessage'=>$validator->messages(), 'custommessage'=>$custommessage, 'customblock'=>$customblock]);
    }

}
