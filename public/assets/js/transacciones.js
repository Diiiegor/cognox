//Trae y renderiza la vista para realizar una transferencia a una cuenta nueva
const transCuentasPropias = async (route) => {
    buttonState(true, 'Cuentas propias', 'btnCuentasPropias')

    const screen = await fetch(route).then(resp => resp.text())
    document.getElementById('ajaxScreens').innerHTML = screen;
    validarFormularioCuentasPropias()

    buttonState(false, 'Cuentas propias', 'btnCuentasPropias')
}


//Maneja el estado de los botones, puede ser cargando o no
const buttonState = (loading = false, text, id) => {
    const button = document.getElementById(id);
    if (loading) {
        button.setAttribute('disabled', true);
        button.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
    } else {
        button.removeAttribute('disabled');
        button.innerHTML = text;
    }
}


//Si el formulario se valida, lo envia al servidor para realizar las demas validaciones y registrar la transferencia
const registrarTransferenciaPropia = async () => {
    const form = $("#formTransferenciaPropia");

    if (form.valid()) {
        buttonState(true, 'Transferir', 'btnTransferenciaPropia')
        const formData = new FormData(form[0]);
        const route = form.attr('action');

        const resp = await fetch(route, {
            method: 'post',
            body: formData
        }).then(resp => resp.json());

        if (!resp.ok) {
            showErrosDialog(resp.errors)
        } else {
            showTransaccionCorrecta(resp.transaccion);
        }


        buttonState(false, 'Transferir', 'btnTransferenciaPropia')

    }

}


const validarFormularioCuentasPropias = () => {
    $("#formTransferenciaPropia").validate({
        rules: {
            monto: {
                required: true,
                number: true,
            },
        }
    });
}


const showErrosDialog = (errors) => {
    const errorMsgs = errors.map((e) => `<li>${e}</li>`)
    Swal.fire({
        title: 'Transferencia incorrecta',
        icon: 'error',
        html: `<ul>${errorMsgs.join('')}</ul>`,
        confirmButtonColor: '#F27474',
        confirmButtonText: 'Cerrar'
    })
}


const showTransaccionCorrecta = (codigo) => {
    Swal.fire({
        title: 'Transferencia exitosa',
        icon: 'success',
        html: `La transferencia con código <b>#${codigo}</b> se realizó correctamente`,
        confirmButtonColor: '#4A65FA',
        confirmButtonText: 'Aceptar'
    })
}
