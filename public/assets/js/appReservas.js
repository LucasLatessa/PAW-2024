class appReservas{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("PAWReservas", "/assets/js/components/paw-reservas.js",() => {
                let reservas = new PAWReservas(".planoSucursal", "/assets/js/components/reservas.json"); //Le paso el SVG y la lista de reservas
            });
        });
    }
}
let appR = new appReservas();