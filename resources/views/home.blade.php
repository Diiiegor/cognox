@extends('layout.main-layout')
@section('content')
    <div class="flex">
        <p class="subtitle">Inicio</p>
        <p class="title">&nbsp; > &nbsp;Cuentas asociadas</p>
    </div>
    <div class="content">
        <p class="subtitle">Cuentas propias</p>
        <table class="table">
            <thead>
            <tr>
                <th>Cuenta</th>
                <th>Saldo</th>
                <th>Fecha de creación</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cuentasPropias as $cuenta)
                <tr>
                    <td>{{$cuenta->int_cuenta}}</td>
                    <td class="text-primary">{{number_format($cuenta->int_saldo,2)}}</td>
                    <td>{{$cuenta->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p class="subtitle mt-40">Cuentas de terceros</p>
    </div>
@endsection
