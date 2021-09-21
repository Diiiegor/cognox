<?php

namespace App\Services;

use App\Http\Requests\CuentaRequest;
use App\Repositories\CuentasRepository;
use Illuminate\Support\Facades\Auth;

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

    public function validarExistencia($cuenta)
    {
        $cuenta = $this->cuentasRepository->findOne([['int_cuenta', '=', $cuenta]]);
        if ($cuenta == null) {
            return false;
        } else {
            return true;
        }
    }

    public function inscribir($cuenta, $estado, $usrId)
    {
        $cuentaDb = $this->cuentasRepository->findOne([['int_cuenta', '=', $cuenta]]);
        return $this->cuentasRepository->inscribir($cuentaDb->id, $estado, $usrId);
    }

}
