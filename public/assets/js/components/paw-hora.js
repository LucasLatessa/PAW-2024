class PAWHora{
    constructor(){
        // Obtener el elemento HTML donde quieres mostrar la hora
        const horaElemento = document.querySelector('h2');
        this.actualizarHora(horaElemento);
    }
    // Función para obtener la hora actual y actualizar el elemento HTML
    actualizarHora(horaElemento) {
        const fechaHora = new Date();
        const hora = fechaHora.getHours();
        const minutos = fechaHora.getMinutes();

        // Formatear la hora y los minutos para que tengan siempre dos dígitos
        const horaFormateada = hora.toString().padStart(2, '0');
        const minutosFormateados = minutos.toString().padStart(2, '0');

        // Actualizar el contenido del elemento HTML con la hora actual
        horaElemento.textContent = `Hora - ${horaFormateada}:${minutosFormateados}`;
}

}