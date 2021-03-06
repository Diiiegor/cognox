<?php

namespace App\Services;

use App\Models\Transaccion;
use App\Repositories\CuentasRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class TransferenciaService
{
    private $cuentasRepository;

    public function __construct()
    {
        $this->cuentasRepository = new CuentasRepository();

    }

    public function validarTransferencia(Request $request): array
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


    public function transferir($idOrige, $idDestino, $monto)
    {
        $cuentaOrigen = $this->cuentasRepository->findOne([['id', '=', $idOrige]]);
        $cuentaDestino = $this->cuentasRepository->findOne([['id', '=', $idDestino]]);

        $cuentaOrigen->int_saldo = $cuentaOrigen->int_saldo - $monto;
        $cuentaDestino->int_saldo = $cuentaDestino->int_saldo + $monto;

        $cuentaOrigen->save();
        $cuentaDestino->save();

        $transaccion = Transaccion::create([
            'int_cuenta_origen' => $idOrige,
            'int_cuenta_destino' => $idDestino,
            'int_user_id' => Auth::user()->id,
            'int_monto' => $monto
        ]);
        return $transaccion->id;
    }

    public function transferenciasDatatable(Request $request)
    {

        $query = DB::table('transacciones')
            ->join('cuentas as origen', 'transacciones.int_cuenta_origen', '=', 'origen.id')
            ->join('cuentas as destino', 'transacciones.int_cuenta_destino', '=', 'destino.id')
            ->where('transacciones.int_user_id', '=', Auth::user()->id)
            ->select([
                'transacciones.int_monto',
                'transacciones.created_at',
                'origen.int_cuenta as origen',
                'destino.int_cuenta as destino'
            ]);



        return DataTables::query($query)->toJson();

    }

}
