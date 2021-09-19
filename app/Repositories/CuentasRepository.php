<?php

namespace App\Repositories;

use App\Models\Cuenta;
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

}
