<?php

namespace App\Services;

use App\Http\Requests\CuentaRequest;
use App\Models\Cuenta;
use App\Models\CuentaInscrita;
use App\Repositories\CuentasRepository;
use App\Repositories\TransaccionesRepository;
use Illuminate\Support\Facades\Auth;

class CuentasService
{

    private $cuentasRepository;
    private $transaccionesRepository;

    public function __construct()
    {
        $this->cuentasRepository = new CuentasRepository();
        $this->transaccionesRepository = new TransaccionesRepository();
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

    public function estadoDeCuentas()
    {
        $cuentasPropias = $this->cuentasRepository->cuentasPropias();
        foreach ($cuentasPropias as $index => $cuentaPropia) {
            $cuentasPropias[$index]->estado = $this->transaccionesRepository->estadoDeCuenta($cuentaPropia->id);
        }

        return $cuentasPropias;
    }

    public function cambiarEstado($id, $estado)
    {
        Cuenta::find($id)->update(['int_activa' => $estado]);
    }

    public function cambiarEstadoTerceros($id, $estado)
    {
        CuentaInscrita::find($id)->update(['int_activa' => $estado]);
    }

}
