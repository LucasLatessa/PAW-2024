class PAWCocina{

    constructor(pedidos){
        this.generarPedidos(pedidos);

        // Intervalo para verificar pedidos demorados cada minuto
        setInterval(() => {
            this.verificarPedidosDemorados();
        }, 60000);
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

                nombre.classList.add("nombre"); /info-item/
                ingredientes.classList.add("ingredientes");/info-item/
                aclaraciones.classList.add("aclaraciones");/info-item/
                listItem.classList.add("item");

                listItem.appendChild(nombre);
                listItem.appendChild(ingredientes);
                listItem.appendChild(aclaraciones);

                items.appendChild(listItem);
            });
            
            items.classList.add("items");
            //cabecera.classList.add(this.getEstadoClase(pedido.estado, pedido.hora));   /** "estado": "En preparación" y "hora": "10:00" */
            if (pedido.estado === "Listo para retirar"){
                cabecera.classList.add("cabeceraListo");
            }else{
                cabecera.classList.add("cabeceraPreparacion");
            } 
            
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
        const pedidoN = boton.closest('article.pedido'); //encuentra el ancestro más cercano (o el mismo elemento) que coincide con el selector especificado/
        const pedidoId = pedidoN.getAttribute('data-id');

        // Encontrar el pedido correspondiente en el JSON
        const pedido = this.pedidos.find(p => p.numero === pedidoId); /** find encuentra el 1° elemento de una array que coincida con una concidicion dada */
        if (pedido.estado === "En preparación" || pedido.estado === "PRIORIDAD") {     
            pedido.estado = "Listo para retirar";
            // Esta parte en la lógica se deberia genera algun POST hacia el servidor, enviando
            //actualización del pedido en el json, usar un fetch, es decir que ese Listo para retirar sea impactado en db o en el json 
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

    getEstadoClase(estado, horaPedido){
        const horaActual = this.getHoraActual();
        const limiteMinutosDemora = 2;
        if (estado === "Listo para retirar") {
            return "cabeceraListo";
        } else if (estado === "En preparación" && this.estaDemorado(horaPedido, horaActual, limiteMinutosDemora)) {
            return "cabeceraPRIORIDAD";
        } else {
            return "cabeceraPreparacion";
        }
    }

    getHoraActual(){
        const ahora = new Date();
        const horas = String(ahora.getHours()).padStart(2, '0');
        const minutos = String(ahora.getMinutes()).padStart(2, '0');
        return `${horas}:${minutos}`;
    }

    estaDemorado(horaPedido, horaActual, limiteMinutos){
        const [horasP, minutosP ] = horaPedido.split(':').map(Number);
        const [horasActual, minutosActual] = horaActual.split(':').map(Number);

        const orderDate = new Date();
        orderDate.setHours(horasP, minutosP);

        const currentDate = new Date();
        currentDate.setHours(horasActual, minutosActual);

        const diferenciaMilisegundos = currentDate - orderDate;
        const diferenciaMinutos = diferenciaMilisegundos  / 1000 / 60;

        return diferenciaMinutos > limiteMinutos;
    }

    verificarPedidosDemorados(){
       

        const pedidosSection = document.querySelector(".pedidos");
        const horaA = this.getHoraActual();
        console.log("Hora actual " + horaA);
        const limiteMinutos = 1;
        console.log("pedidos json " + this.pedidos);

        this.pedidos.forEach(pedido => {
            if (pedido.estado === "En preparación" && this.estaDemorado(pedido.hora, horaA, limiteMinutos)) {
                let dataid = pedido.numero;
                console.log(dataid);
                //Buscar el elemento con el data-id coincidente
                const pedidoElement = Array.from(pedidosSection.querySelectorAll(".pedido"))
                .find(ped => ped.getAttribute('data-id') === dataid);

                // Verificar si se encontró el elemento
                if (pedidoElement) {
                    /* es buena esta idea tambien porque
                    hace titilar todo el article y se nota mas 
                    pedidoElement.classList.add("cabeceraPRIORIDAD");*/

                    const divContenido = pedidoElement.querySelector("div");
                    if (divContenido) {
                        divContenido.classList.add('cabeceraPRIORIDAD'); /**para dar estilo de alerta */
                    }
                    
                } else {
                    console.log("No se encontró ningún elemento con data-id:", dataid);
                }

              
            }
        });
    }
}