<div class="content">
    <div class="content-header">
        <p class="subtitle">Transferir dinero a cuentas propias</p>
    </div>

    <div class="form-box">
        <div class="form-center mt-30">
            <form action="">
                <select required class="input" name="cuentaOrigen" id="cuentaOrigen">
                    <option value="">Seleccione una cuenta origen</option>
                    @foreach($cuentasOrigen as $cuenta)
                        <option value="{{$cuenta->id}}">{{$cuenta->int_cuenta}}</option>
                    @endforeach
                </select>

                <select required class="input" name="cuentaDestino" id="cuentaDestino">
                    <option value="">Seleccione una cuenta destino</option>
                    @foreach($cuentasDestino as $cuenta)
                        <option value="{{$cuenta->id}}">{{$cuenta->int_cuenta}}</option>
                    @endforeach
                </select>

                <input required placeholder="Monto a transferir" class="input" type="number" name="monto" id="monto">

                <button class="btn btn-primary mt-10">
                    Transferir
                </button>
            </form>
        </div>
    </div>

</div>
