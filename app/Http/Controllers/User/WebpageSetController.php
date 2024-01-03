<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Providers\RouteServiceProvider;
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
        $customblock = '';
        
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'string', 'min:3', 'max:255'],
            'email' => ['nullable', 'string', 'email:rfc', 'max:255', Rule::unique('users')->ignore($request->user())],
            'password_old' => ['nullable', 'required_with: email, password', 'current_password'],
            'password' => ['nullable', 'min:3', 'confirmed', Password::defaults()],
            'password_confirmation' => ['same:password'],
            'agree' => ['required_with:name,email,password'],
        ]);

        $array = array();
        $custommessage = $erroryes;
        if (!$validator->fails()){
            if ($request->name != '') { $array['name'] = $request->name; }
            if ($request->email != '') { $array['email'] = $request->email; }
            if ($request->password != '') { $array['password'] = Hash::make($request->password); }

            foreach ($array as $key => $value){
                DB::table('users')
                    ->where('id', $request->user()->id)
                    ->update([$key => $value]);
            }
            $custommessage = $errorno;
        }

        return response()->json(['errormessage'=>$validator->messages(), 'custommessage'=>$custommessage, 'customblock'=>$customblock]);
    }
}
