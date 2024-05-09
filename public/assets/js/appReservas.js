class appReservas{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("PAWReservas", "/assets/js/components/paw-reservas.js",() => {
                let reservas = new PAWReservas(".planoSucursal"); //Le paso el SVG
            });
        });
    }
}
let appR = new appReservas();