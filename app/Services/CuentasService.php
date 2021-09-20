<?php

namespace App\Services;

use App\Http\Requests\CuentaRequest;
use App\Repositories\CuentasRepository;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

class CuentasService
{

    private $cuentasRepository;

    public function __construct()
    {
        $this->cuentasRepository = new CuentasRepository();
    }

    public function crear(CuentaRequest $request)
    {
        try {
            $this->cuentasRepository->store($request->cuenta, $request->saldoInicial, Auth::user()->id);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}
