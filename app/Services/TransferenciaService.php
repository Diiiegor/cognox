<?php

namespace App\Services;

use App\Repositories\CuentasRepository;
use Illuminate\Http\Request;

class TransferenciaService
{
    private $cuentasRepository;

    public function __construct()
    {
        $this->cuentasRepository = new CuentasRepository();

    }

    public function validarTransferenciaACuentaPropia(Request $request): array
    {
        $errors = [];
        $cuentaOrigen = $this->cuentasRepository->findOne([['id', '=', $request->cuentaOrigen]]);
        $saldoOrigen = $cuentaOrigen->int_saldo;

        if ($request->cuentaOrigen == $request->cuentaDestino) {
            array_push($errors, 'La cuenta de origen debe ser diferente a la cuenta destino');
        }

        if ($saldoOrigen < $request->monto) {
            array_push($errors, 'La cuenta no tiene saldo suficiente para realizar la transacción');
        }

        return $errors;
    }

}
