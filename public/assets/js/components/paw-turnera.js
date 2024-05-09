class PAWTurnera{
    constructor(pedidos){
        console.log("turnera");
        this.generarTurnos(pedidos);
        this.actualizarTablaPedido(pedidos);
    }

    //FUNCIONES 
    async generarTurnos(pedidos){
        /* const pedidos = [
            { numero: "0001A"},
            { numero: "00004A"},
            { numero: "0008B"}
        ]; */
        const response = await fetch(pedidos);
        const data = await response.json();

        let retirosSection = document.querySelector(".section-retiros");
        
        data.forEach(pedido => {
            let nuevoArticulo = document.createElement("article");
            nuevoArticulo.textContent = pedido.numero;
            retirosSection.appendChild(nuevoArticulo);
        });
        
    }

    async actualizarTablaPedido(pedidos){
       /* const pedidoEstado = [
            { numero: "0001A", estado:"Listo para retirar"},
            { numero: "0002B", estado:"En preparación"},
            { numero: "0003A", estado:"En preparación"}
        ]; */
        const response = await fetch(pedidos);
        const data = await response.json();


        let pedidosSection = document.querySelector(".pedido-estado");
        let tabla = pedidosSection.querySelector("table");
        data.forEach(pedido => {
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