class appCocina{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("PAWCocina","./assets/js/components/paw-displayCocina.js",() => {
                 let displayCocina = new PAWCocina("/assets/js/components/pedidosCocina.json"); //ver de usar tambien json
            });
            PAW.agregarStyle("/assets/styles/cocina.css");
         });
     }
}

let appC = new appCocina();
