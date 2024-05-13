class appPAW {
  /**
   * Clase para generar el script que se quiere
   * e instanciar la clase que se encarga de crear los contenedores
   * y sus estilos.
   */
  constructor() {
    document.addEventListener("DOMContentLoaded", () => {
      PAW.cargarScript(
        "PAWCarousel",
        "./assets/js/components/paw-carousel.js",
        () => {
          let images = [
            { src: "/assets/promo1.jpeg", link: "/compra/menu" },
            { src: "/assets/Hamburguesa.jpg", link: "/compra/menu" },
            { src: "/assets/novedad1.jpg", link: "/compra/reserva" },
          ];
          let carousel = new PAWCarousel(images);
        }
      );

      PAW.agregarStyle("/assets/styles/carousel.css");
    });
  }
}

let app = new appPAW();