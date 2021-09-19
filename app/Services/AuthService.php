<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function checkUser(LoginRequest $request): bool
    {
        return Auth::attempt([
            'int_identificacion' => $request->identificacion,
            'password' => $request->clave
        ]);
    }


}
