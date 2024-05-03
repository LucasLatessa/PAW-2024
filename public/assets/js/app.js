class appPAW {
    /**
     * Plantilla de clase para generar el script que se quiere
     * e instanciar la clase que se encarga de crear los contenedores
     * y sus estilos. 
     */
	constructor() {
        document.addEventListener("DOMContentLoaded", () => {

            PAW.cargarScript("PAWCarousel", "./assets/js/components/paw-carousel.js", () => {
                let imageSources = [
                    "/assets/promo1.jpeg", 
                    "/assets/Hamburguesa.jpg",
                    "/assets/novedad1.jpg"
                ]; 
                let carousel = new PAWCarousel(imageSources);  
            });

            PAW.agregarStyle("/assets/styles/carousel.css");
        });
        
    }
}

let app = new appPAW();