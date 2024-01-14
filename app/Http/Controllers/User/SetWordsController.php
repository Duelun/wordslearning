<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SetWordsController extends Controller
{
    public function wordlist(Request $request): void
    {

    }

    public function modify(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => ['exists:userbooks,id'],
            'newname' => ['string', 'min:3', Rule::unique('userbooks', 'name')->where('user', $request->user()->id)->ignore($request->id)],
            'ownlang' => ['string', 'exists:languages,nativename'],
            'learnlang' => ['string', 'exists:languages,nativename'],
        ]);
        if (!$validator->fails()){
            $array = $this->refreshUserLangs($request);

            $array1 = array();
            $array1['user'] = $request->user()->id;
            $array1['name'] = $request->newname;
            $array1['langforeign'] = $array['learnedlang'];
            $array1['langown'] = $array['ownlang'];
            $array1['created_at'] = now();

            DB::table('userbooks')->where('id', $request->id)->update($array1);

            [$custommessage, $customblock] = $this->responseOk($request);

            $customblock['dictlist'] = 'modify';
        }
        else {
            [$custommessage, $customblock] = $this->responseError();
        }
        return response()->json(['errormessage'=>$validator->messages(), 'custommessage'=>$custommessage, 'customblock'=>$customblock]);

    }

    public function delete(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => ['exists:userbooks,id'],
        ]);
        if (!$validator->fails()){
            DB::table('userbooks')->where('id', $request->id)->delete();

            [$custommessage, $customblock] = $this->responseOk($request);

            $customblock['dictlist'] = 'delete';
        }
        else {
            [$custommessage, $customblock] = $this->responseError();
        }

        return response()->json(['errormessage'=>$validator->messages(), 'custommessage'=>$custommessage, 'customblock'=>$customblock]);
    }

    public function save(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'newname' => ['string', 'min:3', Rule::unique('userbooks', 'name')->where('user', $request->user()->id)],
            'ownlang' => ['string', 'exists:languages,nativename'],
            'learnlang' => ['string', 'exists:languages,nativename'],
        ]);
        if (!$validator->fails()){
            $array = $this->refreshUserLangs($request);

            $array1 = array();
            $array1['user'] = $request->user()->id;
            $array1['name'] = $request->newname;
            $array1['langforeign'] = $array['learnedlang'];
            $array1['langown'] = $array['ownlang'];
            $array1['created_at'] = now();

            $request->id = DB::table('userbooks')->insertGetId($array1);

            [$custommessage, $customblock] = $this->responseOk($request);

            $customblock['dictlist'] = 'new';
        }
        else {
            [$custommessage, $customblock] = $this->responseError();
        }
        return response()->json(['errormessage'=>$validator->messages(), 'custommessage'=>$custommessage, 'customblock'=>$customblock]);
    }

    public function responseOk($request): array
    {
        $custommessage = __('Successfull');
        $customblock = array();
        $customblock['id'] = $request->id;
        $customblock['name'] = $request->newname;
        $customblock['ownlang'] = $request->ownlang;
        $customblock['learnlang'] = $request->learnlang;

        return [$custommessage, $customblock];
    }
    public function responseError():array
    {
        $custommessage = __('Not success');
        $customblock = array();
        $customblock['baggedError'] = true;

        return [$custommessage, $customblock];
    }
    public function refreshUserLangs($request): array
    {
        $array = array();
        $array['ownlang'] = DB::table('languages')->where('nativename', $request->ownlang)->value('iso1');
        $array['learnedlang'] = DB::table('languages')->where('nativename', $request->learnlang)->value('iso1');
        foreach ($array as $key => $value){
            $request->user()->update( [$key => $value, ]);
        }
        return $array;
    }
}
