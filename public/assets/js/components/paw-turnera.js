class PAWTurnera{
    constructor(){
        console.log("turnera");
        this.generarTurnos();
        this.actualizarTablaPedido();
    }

    //FUNCIONES 
    generarTurnos(){
        const pedidos = [
            { numero: "0001A"},
            { numero: "00004A"},
            { numero: "0008B"}
        ];
        
        let retirosSection = document.querySelector(".section-retiros");
        
        pedidos.forEach(pedido => {
            let nuevoArticulo = document.createElement("article");
            nuevoArticulo.textContent = pedido.numero;
            retirosSection.appendChild(nuevoArticulo);
        });
        
    }

    actualizarTablaPedido(){
        const pedidoEstado = [
            { numero: "0001A", estado:"Listo para retirar"},
            { numero: "0002B", estado:"En preparación"},
            { numero: "0003A", estado:"En preparación"}
        ];

        let pedidosSection = document.querySelector(".pedido-estado");
        let tabla = pedidosSection.querySelector("table");
        pedidoEstado.forEach(pedido => {
            let nuevoPedido = document.createElement("tr");
            let numeroPedido = document.createElement("td");
            let estadoPedido = document.createElement("td");
            numeroPedido.textContent = pedido.numero;
            estadoPedido.textContent = pedido.estado;
            nuevoPedido.appendChild(numeroPedido);
            nuevoPedido.appendChild(estadoPedido);
            tabla.appendChild(nuevoPedido);
        });
        
    }
}