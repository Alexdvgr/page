/**
 * Manejo de notificaciones modales según parámetros de URL
 * Muestra mensajes diferentes según el código recibido
 */
document.addEventListener('DOMContentLoaded', function () {
    // Obtener parámetros de la URL
    const params = new URLSearchParams(window.location.search);
    const mensaje = params.get('mensaje');

    // Mostrar mensaje si existe un parámetro en la URL
    if (mensaje) {
        let texto = '';
        // Determinar el texto según el tipo de mensaje
        switch (mensaje) {
            case 'Correcto':
                texto = '¡Registro exitoso!';
                break;
            case 'Duplicado':
                texto = 'Este usuario ya estaba registrado.';
                break;
            case 'Error':
                texto = 'Ocurrió un error al registrar.';
                break;
            case 'SinConexion':
                texto = 'No se pudo conectar a la base de datos.';
                break;
            default:
                texto = 'Ocurrió un error desconocido.';
        }

        // Actualizar y mostrar el modal con el mensaje
        document.getElementById('mensajeTexto').innerText = texto;
        const modal = new bootstrap.Modal(document.getElementById('mensajeModal'));
        modal.show();
    }
});