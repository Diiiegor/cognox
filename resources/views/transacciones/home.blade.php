@extends('layout.main-layout')
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
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/transacciones.js')}}"></script>
@endsection

