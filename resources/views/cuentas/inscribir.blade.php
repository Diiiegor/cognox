@extends('layout.main-layout')
@section('content')
    <div class="content">
        <p class="title">Inscripción de cuenta de terceros</p>
        <p class="subtitle">Inscribir cuenta de un tercero para realizar transacciones</p>

        <div class="form-box">
            <div class="form-center mt-30">
                <form action="{{route('cuentas.guardarinscripcion')}}"
                      id="formInscribirCuenta"
                      method="post">
                    @csrf

                    <input required placeholder="Número de cuenta" class="input" type="number" name="cuenta"
                           id="cuenta">
                    <select required name="estado" id="estado" class="input">
                        <option value="">Seleccione un estado</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>

                    <button id="btnInscribirCuenta" type="submit" class="btn btn-primary mt-10">
                        Inscribir
                    </button>
                </form>
                @if($errors->any())
                    <div class="error-box">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{asset('assets/js/crearCuenta.js')}}"></script>
@endsection

