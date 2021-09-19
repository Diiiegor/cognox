//Trae y renderiza la vista para realizar una transferencia a una cuenta nueva
const transCuentasPropias = async (route) => {
    buttonState(true, 'Cuentas propias', 'btnCuentasPropias')

    const screen = await fetch(route).then(resp => resp.text())
    document.getElementById('ajaxScreens').innerHTML = screen;

    buttonState(false, 'Cuentas propias', 'btnCuentasPropias')
}


//Maneja el estado de los botones, puede ser cargando o no
const buttonState = (loading = false, text, id) => {
    const button = document.getElementById('btnCuentasPropias');
    if (loading) {
        button.setAttribute('disabled', true);
        button.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
    } else {
        button.removeAttribute('disabled');
        button.innerHTML = text;
    }
}
