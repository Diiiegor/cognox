<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function authenticate(LoginRequest $request): bool
    {
        return Auth::attempt([
            'int_identificacion' => $request->identificacion,
            'password' => $request->clave
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }


}
