<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest as RequestsLoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RequestsLoginRequest $request)
    {
        // $user = User::where('email',$request->email)->first();
        // if(!$user || !Hash::check($request->password, $user->password)){
        //     throw ValidationException::withMessages([
        //         'email'=>['The credentials you entered are incorrect. ']
        //     ]);
        // }

        if (!auth()->attempt($request->only(['email','password']))) {
            throw ValidationException::withMessages([
                'email' => ['The credentials you entered are incorrect. '],
            ]);
        }

    }
}
