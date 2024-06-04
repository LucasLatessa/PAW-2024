class appReservas{
    constructor(){
        document.addEventListener("DOMContentLoaded", () => {
            PAW.cargarScript("PAWReservas", "/assets/js/components/paw-reservas.js",() => {
                let reservas = new PAWReservas(".planoSucursal", "/compra/reservasAll"); //Le paso el SVG y la lista de reservas
                //this.cargarReservas("/compra/reservasAll");
            });
        });
    }
}

let appR = new appReservas();