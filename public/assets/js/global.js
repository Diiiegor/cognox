const cerrarSesion = (event) => {
    event.preventDefault();
    Swal.fire({
        title: 'cerrar sesión',
        text: '¿ Seguro que desea cerrar sesión ?',
        icon: 'question',
        confirmButtonText: 'Salir',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        confirmButtonColor: '#4A65FA'
    }).then((confirm) => {
        if (confirm.isConfirmed) {
            document.getElementById('frm-logout').submit();
        }
    })
}
