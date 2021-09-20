@extends('layout.main-layout')
@section('content')
    <div class="flex">
        <p class="title">&nbsp;Cuentas inscritas</p>
    </div>
    <div class="content">

        @if ($message = Session::get('msg'))
            <div class="success-box">
                <ul>
                    <li>{{$message}}</li>
                </ul>
            </div>
        @endif

        <p class="subtitle">Cuentas propias</p>
        <a href="{{route('cuentas.crear')}}">
            <p>Inscribir cuenta propia</p>
        </a>

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
    </div>


    <div class="content">
        <p class="subtitle">Cuentas de terceros</p>
        <a href="{{route('cuentas.inscribir')}}">
            <p>Inscribir cuenta de un tercero</p>
        </a>
        <table class="table">
            <thead>
            <tr>
                <th>Cuenta</th>
                <th>Saldo</th>
                <th>Fecha de creación</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cuentasTerceros as $cuenta)
                <tr>
                    <td>{{$cuenta->cuenta->int_cuenta}}</td>
                    <td class="text-primary">{{number_format($cuenta->cuenta->int_saldo,2)}}</td>
                    <td>{{$cuenta->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
