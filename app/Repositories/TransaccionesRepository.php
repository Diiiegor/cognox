<?php

namespace App\Repositories;

use App\Models\Transaccion;

class TransaccionesRepository
{

    public function estadoDeCuenta($idcuenta)
    {
        return Transaccion::where('int_cuenta_destino', $idcuenta)->orWhere('int_cuenta_origen', $idcuenta)->orderBy('id')->get();
    }

}
