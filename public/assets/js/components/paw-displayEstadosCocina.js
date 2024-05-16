class PAWCocina{
    
    constructor(pedidos){
        this.generarPedidos(pedidos);
    }

    async generarPedidos(pedidos){
        const response = await fetch(pedidos);
        const datapedidos = await response.json();
        let pedidosSection = document.querySelector(".pedidos");
        
        this.pedidos = datapedidos;

        datapedidos.forEach(pedido => {
            let pedidoN = document.createElement("article"); /**article pedido */
            pedidoN.setAttribute('data-id', pedido.numero); /**seteo un id = numero pedido para el article */
            let cabecera = document.createElement("div");
            let items = document.createElement("article");
            let boton = document.createElement("a");
            let hora = document.createElement("h5"); /** orden aceptada a : */
        
            cabecera.textContent = "PEDIDO " + pedido.numero +" - "+ pedido.hora; 

            // Iterar sobre los items del pedido
            pedido.items.forEach(item => {
                let listItem = document.createElement("ul");
                let nombre = document.createElement("li");
                let ingredientes = document.createElement("li");
                let aclaraciones = document.createElement("li");

                nombre.textContent = item.nombre;
                ingredientes.textContent = item.ingredientes;
                aclaraciones.textContent = item.aclaraciones;

                nombre.classList.add("nombre"); /*info-item*/
                ingredientes.classList.add("ingredientes");/*info-item*/
                aclaraciones.classList.add("aclaraciones");/*info-item*/
                listItem.classList.add("item");

                listItem.appendChild(nombre);
                listItem.appendChild(ingredientes);
                listItem.appendChild(aclaraciones);

                items.appendChild(listItem);
            });
            
            items.classList.add("items");
            if (pedido.estado === "Listo para retirar"){
                cabecera.classList.add("cabeceraListo");
            }else{
                cabecera.classList.add("cabeceraPreparacion");
            } /** poner cabecera en rojo para prioridad */
            
            pedidoN.classList.add("pedido");
            pedidoN.appendChild(cabecera);
            pedidoN.appendChild(items);
            if (pedido.estado === "En preparación"){
                boton.textContent = "LISTO";
                boton.classList.add("boton-listo"); /** para manejar los eventos del click */
                pedidoN.appendChild(boton); 
            }
            pedidosSection.appendChild(pedidoN);         
        });

        this.eventos(); 
    }   

    /** se consultan todos los botones de cada article pedido y se agrega evento click
     * y en caso de marcar uno de ellos como listo, se lo busca para actualizar front end
     * y a futuro avisar al servidor el cambio del estado del pedido a Listo para retirar.
     */
    eventos() {
        document.querySelectorAll('.boton-listo').forEach(boton => {
            boton.addEventListener('click', this.marcarComoListo.bind(this));
        });
    }

    marcarComoListo(event) {
        const boton = event.target;
        const pedidoN = boton.closest('article.pedido'); /*encuentra el ancestro más cercano (o el mismo elemento) que coincide con el selector especificado*/
        const pedidoId = pedidoN.getAttribute('data-id');

        // Encontrar el pedido correspondiente en el JSON
        const pedido = this.pedidos.find(p => p.numero === pedidoId); /** find encuentra el 1° elemento de una array que coincida con una concidicion dada */
        if (pedido) {                                                  /** aca seria encontrar el primer pedido donde el su numero sea igual al pedidoId */
            pedido.estado = "Listo para retirar";
            // Esta parte en la lógica se deberia genera algun POST hacia el servidor, enviando
            //actualización del pedido en el json, usar un fetch
            this.actualizarPedido(pedidoN); //esto actualiza el frontend, quitando boton y cambiando estilo
        }
    }

    actualizarPedido(pedidoN) {
        const cabecera = pedidoN.querySelector('div');
        cabecera.classList.remove('cabeceraPreparacion');
        cabecera.classList.add('cabeceraListo');

        // Eliminar el botón "LISTO"
        const boton = pedidoN.querySelector('.boton-listo');
        if (boton) {
            boton.remove();
        }
    }
}