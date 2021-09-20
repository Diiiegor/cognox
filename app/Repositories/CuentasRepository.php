<?php

namespace App\Repositories;

use App\Models\Cuenta;
use App\Models\CuentaInscrita;
use Illuminate\Support\Facades\Auth;

class CuentasRepository
{
    public function cuentasPropias()
    {
        return Auth::user()->cuentas()->get();
    }

    public function findOne($filter)
    {
        return Cuenta::where($filter)->first();
    }

    public function cuentasTerceros()
    {
        return CuentaInscrita::where('int_id_usuario', Auth::user()->id)->with('cuenta')->get();
    }

    public function store($cuenta, $saldo, $user)
    {
        return Cuenta::create([
            'int_cuenta' => $cuenta,
            'int_user_id' => $user,
            'int_saldo' => $saldo
        ]);
    }

}
