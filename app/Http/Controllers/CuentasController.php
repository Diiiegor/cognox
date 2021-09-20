<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuentaRequest;
use App\Services\CuentasService;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    private $cuentasService;

    public function __construct(CuentasService $cuentasService)
    {
        $this->cuentasService = $cuentasService;
    }

    public function store(CuentaRequest $request)
    {
        if ($this->cuentasService->crear($request)) {
            return redirect()->route('home')->with('msg', 'Cuenta creada correctamente');
        } else {
            return back()->withErrors('Ocurrió un error en la creación de la cuenta')->withInput();
        }
    }
}
