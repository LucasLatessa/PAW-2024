class appCocina{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("PAWCocina","./assets/js/components/paw-displayEstadosCocina.js",() => {
                 let displayCocina = new PAWCocina("/api/pedidosCocina"); 
            });
            PAW.agregarStyle("/assets/styles/estadococina.css");
         });
     }
}

let appC = new appCocina();
