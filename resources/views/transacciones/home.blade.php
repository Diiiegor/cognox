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
                        onclick="transCuentasPropias('{{route('transacciones.propias')}}')">
                    Cuentas propias
                </button>
                <button class="btn btn-primary">
                    Cuentas de terceros
                </button>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/transacciones.js')}}"></script>
@endsection

