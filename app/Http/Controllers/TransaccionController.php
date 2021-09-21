<?php

namespace App\Http\Controllers;

use App\Repositories\CuentasRepository;
use App\Services\TransferenciaService;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    private $cuentasRepository;
    private $transferenciaService;

    public function __construct(CuentasRepository $cuentasRepository, TransferenciaService $transferenciaService)
    {
        $this->cuentasRepository = $cuentasRepository;
        $this->transferenciaService = $transferenciaService;
    }

    public function nuevaTransferencia()
    {
        $cuentasOrigen = $this->cuentasRepository->cuentasPropias();
        $cuentasDestino = $cuentasOrigen;
        return view('transacciones.propias', compact('cuentasOrigen', 'cuentasDestino'));
    }

    public function nuevaTransferenciaTerceros()
    {
        $cuentasOrigen = $this->cuentasRepository->cuentasPropias();
        $cuentasDestino = $this->cuentasRepository->cuentasTerceros();
        return view('transacciones.terceros', compact('cuentasOrigen', 'cuentasDestino'));
    }


    public function transferir(Request $request)
    {
        $errors = $this->transferenciaService->validarTransferencia($request);
        if (count($errors) > 0) {
            return response(['ok' => false, 'errors' => $errors], 400);
        } else {
            $transaccion = $this->transferenciaService->transferir($request->cuentaOrigen, $request->cuentaDestino, $request->monto);
            return response(['ok' => true, 'transaccion' => $transaccion], 200);
        }
    }

}
