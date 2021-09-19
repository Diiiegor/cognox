<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login()
    {
        return view('auth.login');
    }


    public function authenticate(LoginRequest $request)
    {
        if ($this->authService->checkUser($request)) {
            return redirect('/');
        }

        return back()->withErrors('Identificación o clave incorrectos')->withInput();
    }

}
