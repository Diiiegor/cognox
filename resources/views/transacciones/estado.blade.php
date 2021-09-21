@extends('layout.main-layout')

@section('content')
    <div class="flex">
        <p class="title">&nbsp;Estado de cuentas</p>
    </div>
    <div class="content">

        @foreach($estadoDeCuenta as $estado)
            <div class="flex">
                <p class="title">&nbsp;Cuenta: </p>
                <p class="subtitle">&nbsp;{{$estado->int_cuenta}}</p>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>Cuenta origen</th>
                    <th>Cuenta destino</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                </tr>
                </thead>
                <tbody>
                @foreach($estado->estado as $transaccion)
                    <tr>
                        <td>{{$transaccion->cuentaOrigen->int_cuenta}}</td>
                        <td>{{$transaccion->cuentaDestino->int_cuenta}}</td>
                        <td>
                            @if($estado->int_cuenta == $transaccion->cuentaOrigen->int_cuenta)
                                <span class="span-danger">-{{$transaccion->int_monto}}</span>
                            @else
                                <span class="span-primary">{{$transaccion->int_monto}}</span>
                            @endif
                        </td>
                        <td>{{$transaccion->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>



            <hr>

        @endforeach

    </div>
@endsection


