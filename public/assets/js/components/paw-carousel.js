class PAWCarousel{
    constructor(imageSources){
        this.imageSources = imageSources;
        this.slideActual = 0;
        this.intervalId = null;
        this.initCarousel();
    }

    #FUNCIONES 

    initCarousel() {
        let mainElement = document.querySelector("main");
        let pedirMainSection = mainElement.querySelector(".pedirMain");
        let padrePedirMain = pedirMainSection.parentNode;
        //creación del carousel, su estructura y elementos necesarios
        let carouselSection = this.crearCarousel();
        padrePedirMain.insertBefore(carouselSection, pedirMainSection);

        let ulimages = carouselSection.querySelector(".images");
        let ulindi = carouselSection.querySelector('.indicators'); 
        //inserción de imagenes en cada elemento del carousel
        this.crearImagenes(this.imageSources, ulimages, ulindi);

        const slides = ulimages.querySelectorAll("img");
        const totalSlides = slides.length;

        let divProgressBar = carouselSection.querySelector('.progressbar');

        //dentro del cargarImagenes uso un callback para que el startcarousel
        //empiece despues de que se hayan cargado todas las imagenes bien
        this.cargarImagenes(this.imageSources, divProgressBar, () => {
            this.startCarousel(ulimages, ulindi, totalSlides);
        });

        //carouselSection.addEventListener("mouseover", () => this.stopCarousel());
        //carouselSection.addEventListener("mouseout", () => this.startCarousel(ulimages, ulindi, slides, totalSlides));
        ulindi.addEventListener("click", event => this.handleIndicatorClick(event, ulimages, ulindi));
    }

    crearImagenes(imageSources, ulimages, ulindicators) {
        imageSources.forEach(source => {
            let li = document.createElement("li");
            let a = document.createElement("a");
            a.href = "#";
            let img = document.createElement("img");
            img.src = source;
            a.appendChild(img);
            li.appendChild(a);
            ulimages.appendChild(li);
            //Creación de Ul con li para los indicadores debajo del carousel
            //por cada imagen recorrida creo un elemento li para un indicador que la identifica
            let indicatorLi = document.createElement("li");
            ulindicators.appendChild(indicatorLi);
        });
    }

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

        let ulindicators = document.createElement("ul");
        ulindicators.classList.add("indicators");
        carouselSection.appendChild(ulindicators);

        let divProgressBar = document.createElement("div");
        divProgressBar.classList.add("progressbar");
        carouselSection.appendChild(divProgressBar);

        let nextButton = document.createElement("button");
        let prevButton = document.createElement("button");
        nextButton.classList.add("next-button");
        prevButton.classList.add("prev-button");
        carouselSection.appendChild(nextButton);
        carouselSection.appendChild(prevButton);

        return carouselSection;
    }

    cargarImagenes(imageSources, divProgressBar, callback) {
        let totalImages = imageSources.length;
        let loadedImages = 0;
        
        imageSources.forEach(source => {
            let img = new Image();
            img.onload = () => {
                loadedImages++;
                let progress = (loadedImages / totalImages) * 100;
                divProgressBar.style.width = progress + "%";
    
                if (loadedImages === totalImages) { 
                   callback();
                }
            };
            img.src = source;
        });
    }

    startCarousel(ulimages, ulindi, totalSlides) {
        this.intervalId = setInterval(() => {
            this.slideActual = (this.slideActual + 1) % totalSlides;
            ulimages.style.transform = `translateX(-${this.slideActual * 100}%)`;
            this.actualizarIndicador(ulindi, this.slideActual);
        }, 1800);
    }

    stopCarousel() {
        clearInterval(this.intervalId);
    }

    handleIndicatorClick(event, ulimages, ulindi) {
        const index = Array.from(ulindi.children).indexOf(event.target);
        this.slideActual = index;
        ulimages.style.transform = `translateX(-${this.slideActual * 100}%)`;
        this.actualizarIndicador(ulindi, this.slideActual);
    }

    actualizarIndicador(ulindicators, slideActual) {
        const indicators = ulindicators.querySelectorAll("li");
        indicators.forEach((indicator, index) => {
            if (index === slideActual) {
                indicator.classList.add("active");
            } else {
                indicator.classList.remove("active");
            }
        });
    }


    nextImage() {  
        indexActual = (indexActual + 1) % images.length;//modulo % para calcular el indice de la siguiente imagen
        showImage(indexActual);
    }

    prevImage() {
        indexActual = (indexActual - 1 + images.length) % images.length;
        showImage(indexActual);
    }
}

