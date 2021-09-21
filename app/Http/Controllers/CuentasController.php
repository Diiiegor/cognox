<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuentaRequest;
use App\Models\Cuenta;
use App\Models\CuentaInscrita;
use App\Services\CuentasService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->route('home')->with('cuentaCreada', 'Cuenta creada correctamente');
        } else {
            return back()->withErrors('Ocurrió un error en la creación de la cuenta')->withInput();
        }
    }

    public function guardarinscripcion(Request $request)
    {
        if ($this->cuentasService->validarExistencia($request->cuenta)) {
            $this->cuentasService->inscribir($request->cuenta, $request->estado, Auth::user()->id);
            return redirect()->route('home')->with('cuentaInscrita', 'Cuenta inscrita correctamente');
        } else {
            return back()->withErrors('La cuenta bancaria ingresada no existe')->withInput();
        }
    }

    public function estado()
    {
        $estadoDeCuenta = $this->cuentasService->estadoDeCuentas();
        return view('transacciones.estado', compact('estadoDeCuenta'));
    }

    public function activar($cuenta)
    {
        $this->cuentasService->cambiarEstado($cuenta,1);
        return redirect()->back();
    }

    public function inactivar($cuenta)
    {
        $this->cuentasService->cambiarEstado($cuenta,0);
        return redirect()->back();
    }

    public function activarTerceros($cuenta)
    {
        $this->cuentasService->cambiarEstadoTerceros($cuenta,1);
        return redirect()->back();
    }

    public function inactivarTerceros($cuenta)
    {
        $this->cuentasService->cambiarEstadoTerceros($cuenta,0);
        return redirect()->back();
    }

}
