class PAWCocina {
    constructor(pedidos){
        this.generarPedidosTD(pedidos);
    }

    async generarPedidosTD(pedidos){
        const response = await fetch(pedidos);
        const datapedidos = await response.json();

        let takeSection = document.querySelector(".display-takeaway");
        let deliverySection = document.querySelector(".display-delivery");
        let tablaTake = takeSection.querySelector("table");
        let tablaDelivey = deliverySection.querySelector("table");

        datapedidos.forEach(pedido => {
            let pedidoX = document.createElement("tr");
            let id = document.createElement("td");
            let hora = document.createElement("td");
            let nombre = document.createElement("td");
            let ingredientes = document.createElement("td");
            let aclaraciones = document.createElement("td");

            id.textContent = pedido.numero;
            hora.textContent = pedido.hora;
            nombre.textContent = pedido.nombre;
            ingredientes.textContent = pedido.ingredientes;
            aclaraciones.textContent = pedido.aclaraciones;

            pedidoX.appendChild(id);
            pedidoX.appendChild(hora);
            pedidoX.appendChild(nombre);
            pedidoX.appendChild(ingredientes);
            pedidoX.appendChild(aclaraciones);

            if (pedido.tipoPedido === "Take away"){
                tablaTake.appendChild(pedidoX);
            } else if(pedido.tipoPedido === "Delivery"){
                tablaDelivey.appendChild(pedidoX);
            }
           
        });
       
        
    }
}