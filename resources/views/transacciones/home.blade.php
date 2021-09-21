@extends('layout.main-layout')

@section('styles')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="flex">
        <p class="title">&nbsp;Transacciones</p>
    </div>
    <div class="content">
        <div class="content-header">
            <p class="subtitle">Realizar transacción</p>
            <div class="content-header__buttons">
                <button id="btnCuentasPropias" class="btn btn-primary"
                        onclick="nuevaTransaccion('{{route('transacciones.propias')}}','btnCuentasPropias','Cuentas propias')">
                    Cuentas propias
                </button>
                &nbsp;
                <button id="btnCuentasTerceros" class="btn btn-primary-outline"
                        onclick="nuevaTransaccion('{{route('transacciones.terceros')}}','btnCuentasTerceros','Cuentas de terceros')">
                    Cuentas de terceros
                </button>
            </div>
        </div>
        <input type="hidden" id="tableRoute" value="{{route('transacciones.datatable')}}">

        <table id="tableTransacciones" class="table">
            <thead>
            <tr>
                <th>Cuenta origen</th>
                <th>Cuenta destino</th>
                <th>Monto</th>
                <th>Fecha de transacción</th>
            </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
            <tr>
                <td><input placeholder="Filtrar cuenta origen" data-column="0" class="input filter_input" type="text">
                </td>
                <td><input placeholder="Filtrar cuenta destino" data-column="1" class="input filter_input" type="text">
                </td>
                <td></td>
                <td></td>
            </tr>
            </tfoot>
        </table>

    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
    <script src="{{asset('assets/js/transacciones.js')}}"></script>
@endsection

