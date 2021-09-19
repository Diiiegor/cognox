<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('login');
    }


    public function authenticate(LoginRequest $request)
    {
        if ($this->authService->authenticate($request)) {
            return redirect('/');
        }

        return back()->withErrors('Identificación o clave incorrectos')->withInput();
    }

}
