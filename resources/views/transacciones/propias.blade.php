<div class="content">
    <div class="content-header">
        <p class="subtitle">Transferir dinero a cuentas propias</p>
    </div>

    @if(count($cuentasOrigen) ==1)
        <div class="error-box">
            <ul>
                <li>Solo dispones de una cuenta y no es posible realizar transferencias entre la misma cuenta.</li>
            </ul>
        </div>
    @endif

    @if(count($cuentasOrigen) ==0)
        <div class="error-box">
            <ul>
                <li>No tienes ninguna cuenta inscrita para realizar transferencias</li>
            </ul>
        </div>
    @endif

    @if(count($cuentasOrigen) > 1)
        <div class="form-box">
            <div class="form-center mt-30">
                <form action="{{route('transacciones.transferir')}}"
                      onsubmit="registrarTransferenciaPropia();return false"
                      id="formTransferenciaPropia"
                      method="post">
                    @csrf
                    <select required class="input" name="cuentaOrigen" id="cuentaOrigen">
                        <option value="">Seleccione una cuenta origen</option>
                        @foreach($cuentasOrigen as $cuenta)
                            <option {{$cuenta->int_activa ==0?'disabled':''}} value="{{$cuenta->id}}">{{$cuenta->int_cuenta}}</option>
                        @endforeach
                    </select>

                    <select required class="input" name="cuentaDestino" id="cuentaDestino">
                        <option value="">Seleccione una cuenta destino</option>
                        @foreach($cuentasDestino as $cuenta)
                            <option {{$cuenta->int_activa ==0?'disabled':''}} value="{{$cuenta->id}}">{{$cuenta->int_cuenta}}</option>
                        @endforeach
                    </select>

                    <input min="1" required placeholder="Monto a transferir" class="input" type="number" name="monto"
                           id="monto">

                    <button id="btnTransferenciaPropia" type="submit" class="btn btn-primary mt-10">
                        Transferir
                    </button>
                </form>
            </div>
        </div>

    @endif

</div>

<div class="mt-50"></div>
