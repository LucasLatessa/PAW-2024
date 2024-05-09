class appPlatos{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("PAWNuevosPlatos", "/assets/js/components/paw-nuevosPlatos.js",() => {
                let reservas = new PAWReservas();
            });
        });
    }
}
let appP = new appPlatos();