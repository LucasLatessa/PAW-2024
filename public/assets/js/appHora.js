class appHora{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("PAWHora","./assets/js/components/paw-hora.js",() => {
                 let hora = new PAWHora(); //ver de usar tambien json
            });
         });
     }
}

let appH = new appHora();
