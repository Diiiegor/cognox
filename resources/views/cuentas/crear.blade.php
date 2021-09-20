@extends('layout.main-layout')
@section('content')
    <div class="content">
        <p class="title">Inscripción de cuenta propia</p>
        <p class="subtitle">Inscribir cuenta para realizar transacciones</p>

        <div class="form-box">
            <div class="form-center mt-30">
                <form action="{{route('cuentas.store')}}"
                      id="formInscribirCuenta"
                      method="post">
                    @csrf

                    <input required placeholder="Número de cuenta" class="input" type="number" name="cuenta"
                           id="cuenta">
                    <input min="1" required placeholder="Saldo inicial" class="input" type="number" name="saldoInicial"
                           id="saldoInicial">

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

