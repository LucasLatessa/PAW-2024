class PAWCarousel{
    /**
     * Plantilla para el carousel
     * Revisar si hay funciones que se puedan reutilizar
     * Revisar si generamos todo dinamicamente; section, class, img, h2, etc
     * o si bien partimos del section y ese mismo vamos modificando via js
     *  
     * Para implementar esta clase hay que eliminar el section "carousel-container" previo 
     * y usar carousel.css como styles
     */
    constructor(imageSources){
        //busco elemento <main>
        let mainElement = document.querySelector("main");

        //busco elemento <section> con class = 'pedirMain'
        let pedirMainSection = mainElement.querySelector(".pedirMain");

        //busco el nodo padre de pedirMainSection
        let padrePedirMain = pedirMainSection.parentNode;
    
        //creo el carouselSection
        let carouselSection = this.crearCarousel();
    
        //inserto el carouselSection antes del pedirMainSection 
        padrePedirMain.insertBefore(carouselSection, pedirMainSection);

        //busco el contenedor ul dentro del section carousel-home
        //creo contenedores li con a y img
        let ul = carouselSection.querySelector("ul");
        this.crearImagenes(imageSources, ul);

        /**
         * Agregar eventos de clic para botones
         */

        /**
         * Agregar eventos de carga barra de progreso
         */

        //constantes para determinar cantidad de img deben tener las transiciones
        let slideActual = 0;
        const slides = ul.querySelectorAll("img");
        const totalSlides = slides.length;
        let intervalId;

        //función que inicia el carousel, en función de la slide actual y el total de img
        function startCarousel() {
            intervalId = setInterval(() => {
                slideActual = (slideActual + 1) % totalSlides;
                ul.style.transform = `translateX(-${slideActual * 100}%)`;
            }, 2100);
        }

        //función que frena el carousel, reinicia la variable de intervalo 
        function stopCarousel() {
            clearInterval(intervalId);
        }

        startCarousel();

        //eventos Listener para detener o comenzar(continuar) el carousel
        //cuando se pasa o no el mouse por encima.
        carouselSection.addEventListener("mouseover", stopCarousel);
        carouselSection.addEventListener("mouseout", startCarousel);
    }

    #FUNCIONES

    //funcion que recibe un conjunto de img (path) y el contenedor ul a colocarlas
    //se colocan li + a + # + img por cada imagen que tiene el conjunto imageSources
    crearImagenes(imageSources, ul) {
        imageSources.forEach(source => {
            let li = document.createElement("li");
            let a = document.createElement("a");
            a.href = "#"; // aca puedo especificar el enlace o podria ir aparte con una función**
            let img = document.createElement("img");
            img.src = source;
            a.appendChild(img);
            li.appendChild(a);
            ul.appendChild(li);
        });
    }

    //función que crea el contenedor completo del carousel con el section, 
    //su clase, el titulo h2, el ul y la clase del ul
    crearCarousel() {
        let carouselSection = document.createElement("section");
        carouselSection.classList.add("carousel-home");

        let tituloPromociones = document.createElement("h2");
        tituloPromociones.textContent = "Promociones";
        tituloPromociones.classList.add("titulo-promociones");

        let ul = document.createElement("ul");
        ul.classList.add("images");
        carouselSection.appendChild(tituloPromociones);
        carouselSection.appendChild(ul);

        /** creación de botones siguiente-anterior e indicators*/

        return carouselSection;
    }
}

