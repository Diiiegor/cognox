@extends('layout.main-layout')
@section('content')
    <div class="flex">
        <p class="title">&nbsp;Cuentas inscritas</p>
    </div>
    <div class="content">

        @if ($message = Session::get('cuentaCreada'))
            <div class="success-box">
                <ul>
                    <li>{{$message}}</li>
                </ul>
            </div>
        @endif

        <p class="subtitle">Cuentas propias</p>
        <a href="{{route('cuentas.crear')}}">
            <p>Inscribir cuenta propia &nbsp; <i class="fas fa-plus-circle"></i></p>
        </a>

        <table class="table">
            <thead>
            <tr>
                <th>Cuenta</th>
                <th>Saldo</th>
                <th>Estado</th>
                <th>Fecha de creación</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cuentasPropias as $cuenta)
                <tr>
                    <td>{{$cuenta->int_cuenta}}</td>
                    <td class="text-primary">{{number_format($cuenta->int_saldo,2)}}</td>
                    <td>
                        @if($cuenta->int_activa == 1)
                            <span class="span-primary">Activo</span>
                        @else
                            <span class="span-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>{{$cuenta->created_at}}</td>
                    <td>
                        @if($cuenta->int_activa == 1)
                            <a href=""
                               onclick="enviarFormulario(event,'cuenta_inactivar_{{$cuenta->id}}')">Inactivar</a>
                            <form id="cuenta_inactivar_{{$cuenta->id}}"
                                  action="{{route('cuentas.inactivar',$cuenta->id)}}" method="post">
                                @method('put')
                                @csrf()
                            </form>
                        @else
                            <a href="" onclick="enviarFormulario(event,'cuenta_activar_{{$cuenta->id}}')">Activar</a>
                            <form id="cuenta_activar_{{$cuenta->id}}"
                                  action="{{route('cuentas.activar',$cuenta->id)}}" method="post">
                                @method('put')
                                @csrf()
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="content">

        @if ($message = Session::get('cuentaInscrita'))
            <div class="success-box">
                <ul>
                    <li>{{$message}}</li>
                </ul>
            </div>
        @endif

        <p class="subtitle">Cuentas de terceros</p>
        <a href="{{route('cuentas.inscribir')}}">
            <p>Inscribir cuenta de un tercero &nbsp; <i class="fas fa-plus-circle"></i></p>
        </a>
        <table class="table">
            <thead>
            <tr>
                <th>Cuenta</th>
                <th>Saldo</th>
                <th>Estado</th>
                <th>Fecha de creación</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cuentasTerceros as $cuenta)
                <tr>
                    <td>{{$cuenta->cuenta->int_cuenta}}</td>
                    <td class="text-primary">{{number_format($cuenta->cuenta->int_saldo,2)}}</td>
                    <td>
                        @if($cuenta->int_activa == 1)
                            <span class="span-primary">Activo</span>
                        @else
                            <span class="span-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>{{$cuenta->created_at}}</td>
                    <td>
                        @if($cuenta->int_activa == 1)
                            <a href="" onclick="enviarFormulario(event,'tercero_inactivar_{{$cuenta->id}}')">Inactivar</a>
                            <form id="tercero_inactivar_{{$cuenta->id}}"
                                  action="{{route('terceros.inactivar',$cuenta->id)}}" method="post">
                                @method('put')
                                @csrf()
                            </form>
                        @else
                            <a href="" onclick="enviarFormulario(event,'tercero_activar_{{$cuenta->id}}')">Activar</a>
                            <form id="tercero_activar_{{$cuenta->id}}" method="post"
                                  action="{{route('terceros.activar',$cuenta->id)}}">
                                @method('put')
                                @csrf()
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-50"></div>

@endsection

<script>
    function enviarFormulario(event,form){
        event.preventDefault()
        $(`#${form}`).submit()
    }
</script>
