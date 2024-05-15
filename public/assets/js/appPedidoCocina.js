class appCocina{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("PAWCocina","./assets/js/components/paw-displayEstadosCocina.js",() => {
                 let displayCocina = new PAWCocina("/assets/js/components/pedidosCocina.json"); //ver de usar tambien json
            });
            PAW.agregarStyle("/assets/styles/estadococina.css");
         });
     }
}

let appC = new appCocina();
