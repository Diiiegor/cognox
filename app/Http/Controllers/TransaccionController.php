<?php

namespace App\Http\Controllers;

use App\Repositories\CuentasRepository;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    private $cuentasRepository;

    public function __construct(CuentasRepository $cuentasRepository)
    {
        $this->cuentasRepository = $cuentasRepository;
    }

    public function nuevaTransferencia()
    {
        $cuentasOrigen = $this->cuentasRepository->cuentasPropias();
        $cuentasDestino = $cuentasOrigen;
        return view('transacciones.propias', compact('cuentasOrigen', 'cuentasDestino'));
    }
}
