class PAWTurnera {
    constructor(urlPedidos) {
        this.urlPedidos = urlPedidos;
        this.init();
    }

    init() {
        this.cargarPedidos();

        setInterval(() => this.cargarPedidos(), 10000);
    }

    async cargarPedidos() {
        try {
            const response = await fetch(this.urlPedidos);
            const data = await response.json();

            this.generarTurnos(data);
            this.actualizarTablaPedido(data);
        } catch (error) {
            console.error("Error al cargar los pedidos:", error);
        }
    }

    generarTurnos(pedidos) {
        let retirosSection = document.querySelector(".section-retiros");
    
        
        let articles = retirosSection.querySelectorAll('article');
        articles.forEach(article => article.remove());
    
        // Recorrer los pedidos al reves
        for (let i = pedidos.length - 1; i >= 0; i--) {
            let pedido = pedidos[i];
            if (pedido.estado === "Listo para retirar") {
                let nuevoArticulo = document.createElement("article");
                nuevoArticulo.textContent = pedido.id;
                retirosSection.appendChild(nuevoArticulo);
            }
        }
    }

    actualizarTablaPedido(pedidos) {
        let pedidosSection = document.querySelector(".pedido-estado");
        let tabla = pedidosSection.querySelector("table");

        tabla.innerHTML = `
            <tr>
                <th>Pedido</th>
                <th>Estado</th>
            </tr>
        `;

        pedidos.forEach(pedido => {
            if (!(pedido.estado == "Finalizado")){
                let nuevoPedido = document.createElement("tr");
                let numeroPedido = document.createElement("td");
                let estadoPedido = document.createElement("td");
                numeroPedido.textContent = pedido.id;
                estadoPedido.textContent = pedido.estado;
            
                if (pedido.estado === "Listo para retirar") {
                    estadoPedido.classList.add("listo");
                } else if (pedido.estado === "En preparacion") {
                    estadoPedido.classList.add("prep");
                }

                nuevoPedido.appendChild(numeroPedido);
                nuevoPedido.appendChild(estadoPedido);
                tabla.appendChild(nuevoPedido);
            }
        });
    }
}