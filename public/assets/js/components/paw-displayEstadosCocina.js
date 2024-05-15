class PAWCocina{
    constructor(pedidos){
        this.generarPedidos(pedidos);
    }
    async generarPedidos(pedidos){
        const response = await fetch(pedidos);
        const datapedidos = await response.json();
        let pedidosSection = document.querySelector(".pedidos");
    
    datapedidos.forEach(pedido => {
        let pedidoN = document.createElement("article"); /**article pedido */
        let cabecera = document.createElement("div");
        let items = document.createElement("article");
        let boton = document.createElement("a");
        let hora = document.createElement("h5"); /** orden aceptada a : */
     
        cabecera.textContent = "PEDIDO " + pedido.numero; /*#A0001*/
        hora.textContent = pedido.hora;

       
        
       
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
            pedidoN.appendChild(boton); 
        }
        pedidosSection.appendChild(pedidoN);

       
       
    });
}
}