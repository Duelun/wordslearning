<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email:rfc', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'min:3', 'confirmed', Password::defaults()],
            'agree' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('/')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('form', 'reg');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    public function change(Request $request): JsonResponse
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
                $request->user()->update( [$key => $value, ]);
            }
            $custommessage = $errorno;
        }

        return response()->json(['errormessage'=>$validator->messages(), 'custommessage'=>$custommessage, 'customblock'=>$customblock]);
    }
}
