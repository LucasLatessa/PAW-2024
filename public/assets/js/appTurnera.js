class appTurnera{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
           PAW.cargarScript("PAWTurnera","./assets/js/components/paw-turnera.js",() => {
                let turnera = new PAWTurnera("/api/pedidos");   
                /*let turnera = new PAWTurnera( "/assets/js/components/pedidosCocina.json"); */
           });
           PAW.agregarStyle("/assets/styles/turnos.css");
        });
    }
}
let appT = new appTurnera();