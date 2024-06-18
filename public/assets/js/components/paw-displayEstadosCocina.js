class PAWCocina {
    constructor(pedidosUrl) {
        this.pedidosUrl = pedidosUrl;
        this.pedidos = null;
        this.init();
    }

    async init() {
        await this.generarPedidos();
        setInterval(() => {
            this.generarPedidos();
        }, 10000);
    }

    async generarPedidos() {
        try {
            const response = await fetch(this.pedidosUrl);
            const datapedidos = await response.json();
            
            let pedidosSection = document.querySelector(".pedidos");

            this.pedidos = datapedidos;

            // Limpiar solo los artículos existentes
            let articles = pedidosSection.querySelectorAll('article');
            articles.forEach(article => article.remove());

            // Recorrer los pedidos en orden inverso
            datapedidos.reverse().forEach(pedido => {
                if (pedido.estado !="Finalizado"){
                    let pedidoN = document.createElement("article");
                    pedidoN.setAttribute('data-id', pedido.numero);
                    let cabecera = document.createElement("div");
                    let items = document.createElement("article");
                    let boton = document.createElement("a");
                    let hora = document.createElement("h5");
                
                    cabecera.textContent = "PEDIDO " + pedido.numero + " - " + pedido.hora;

                    // Iterar sobre los items del pedido
                    pedido.items.forEach(item => {
                        
                            let listItem = document.createElement("ul");
                            let nombre = document.createElement("li");
                            let ingredientes = document.createElement("li");
                            let aclaraciones = document.createElement("li");

                            nombre.textContent = item.nombre;
                            ingredientes.textContent = item.descripcion; 
                            aclaraciones.textContent = item.aclaraciones;

                            nombre.classList.add("nombre");
                            ingredientes.classList.add("ingredientes");
                            aclaraciones.classList.add("aclaraciones");
                            listItem.classList.add("item");

                            listItem.appendChild(nombre);
                            listItem.appendChild(ingredientes);
                            listItem.appendChild(aclaraciones);

                            items.appendChild(listItem);
                        
                    });
                    
                    items.classList.add("items");

                    if (pedido.estado === "Listo para retirar") {
                        cabecera.classList.add("cabeceraListo");
                    } else {
                        cabecera.classList.add("cabeceraPreparacion");
                    }
                    
                    pedidoN.classList.add("pedido");
                    pedidoN.appendChild(cabecera);
                    pedidoN.appendChild(items);
                    if (pedido.estado === "En preparacion") {
                        boton.textContent = "LISTO";
                        boton.classList.add("boton-listo");
                        pedidoN.appendChild(boton);
                    }
                    pedidosSection.appendChild(pedidoN);
            }
            });

            this.eventos();
        } catch (error) {
            console.error("Error al generar pedidos:", error);
        }
    }

    eventos() {
        document.querySelectorAll('.boton-listo').forEach(boton => {
            boton.addEventListener('click', this.marcarComoListo.bind(this));
        });
    }

    marcarComoListo(event) {
        const boton = event.target;
        const pedidoN = boton.closest('article.pedido');
        const pedidoId = pedidoN.getAttribute('data-id');
        const pedido = this.pedidos.find(p => p.numero == pedidoId);
        if (pedido.estado === "En preparacion" || pedido.estado === "PRIORIDAD") {
            pedido.estado = "Listo para retirar";
            this.actualizarPedido(pedidoId)
            .then(() => { 
                const cabecera = pedidoN.querySelector('div');
                cabecera.classList.remove('cabeceraPreparacion');
                cabecera.classList.add('cabeceraListo');
   
                const boton = pedidoN.querySelector('.boton-listo');
                if (boton) {
                    boton.remove();
                }
            })
            .catch(error => {
                console.error("Error al actualizar el pedido:", error);
            });
        }
    }

    async actualizarPedido(pedidoId) {
        const url = `/api/pedidosCocina?pedidoId=${pedidoId}`;
        const datos = {
            "estado": "Listo para retirar"
        };
    
        const opciones = {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        };
    
        return fetch(url, opciones)
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error(`Error al actualizar el pedido: ${response.status}`);
                }
            })
            .catch(error => {
                console.error("Error al enviar la solicitud:", error.message);
            });
    }
      

    getHoraActual() {
        const ahora = new Date();
        const horas = String(ahora.getHours()).padStart(2, '0');
        const minutos = String(ahora.getMinutes()).padStart(2, '0');
        return `${horas}:${minutos}`;
    }

    estaDemorado(horaPedido, horaActual, limiteMinutos) {
        const [horasP, minutosP] = horaPedido.split(':').map(Number);
        const [horasActual, minutosActual] = horaActual.split(':').map(Number);

        const orderDate = new Date();
        orderDate.setHours(horasP, minutosP);

        const currentDate = new Date();
        currentDate.setHours(horasActual, minutosActual);

        const diferenciaMilisegundos = currentDate - orderDate;
        const diferenciaMinutos = diferenciaMilisegundos / 1000 / 60;

        return diferenciaMinutos > limiteMinutos;
    }

    verificarPedidosDemorados() {
        const pedidosSection = document.querySelector(".pedidos");
        const horaA = this.getHoraActual();
        const limiteMinutos = 1;

        this.pedidos.forEach(pedido => {
            if (pedido.estado === "En preparacion" && this.estaDemorado(pedido.hora, horaA, limiteMinutos)) {
                let dataid = pedido.numero;

                const pedidoElement = Array.from(pedidosSection.querySelectorAll(".pedido"))
                    .find(ped => ped.getAttribute('data-id') === dataid);

                if (pedidoElement) {
                    const divContenido = pedidoElement.querySelector("div");
                    if (divContenido) {
                        divContenido.classList.add('cabeceraPRIORIDAD');
                    }
                }
            }
        });
    }
}