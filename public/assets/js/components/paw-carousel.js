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
        let nextButton = carouselSection.querySelector(".next-button");
        let prevButton = carouselSection.querySelector(".prev-button");

        nextButton.addEventListener("click", () => this.nextImage());
        prevButton.addEventListener("click", () => this.prevImage());
    }

    crearImagenes(imageSources, ulimages, ulindicators) {
        imageSources.forEach(source => {
            let li = document.createElement("li");
            let a = document.createElement("a");
            a.href = source.link; 
            let img = document.createElement("img");
            img.src = source.src;
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
                divProgressBar.setAttribute("data-progress", Math.round(progress) + "%");
                console.log("Cargando imagen " + source.src + " - " + Math.round(progress)  + "% completado.");//para ver en la consola que van cargando las imagenes
                if (loadedImages === totalImages) { 
                   callback();
                }
            };
            img.src = source.src;
        });
    }

    startCarousel(ulimages, ulindi, totalSlides) {
        this.intervalId = setInterval(() => {
            this.slideActual = (this.slideActual + 1) % totalSlides;
            
            //diferentes efectos de transicion
            const transitionEffects = ['slide', 'fade', 'zoom'];
            const randomEffect = transitionEffects[Math.floor(Math.random() * transitionEffects.length)];
            
            switch (randomEffect) {
                case 'slide':
                    ulimages.style.transition = 'transform 0.5s ease';
                    ulimages.style.transform = `translateX(-${this.slideActual * 100}%)`;
                    break;
                case 'fade':
                    ulimages.style.transition = 'opacity 0.5s ease';
                    ulimages.style.opacity = 0;
                    setTimeout(() => {
                        ulimages.style.transition = '';
                        ulimages.style.opacity = 1;
                        ulimages.style.transform = `translateX(-${this.slideActual * 100}%)`;
                    }, 500);
                    break;
                case 'zoom':
                    ulimages.style.transition = 'transform 0.5s ease';
                    ulimages.style.transform = `scale(0.8)`;
                    setTimeout(() => {
                        ulimages.style.transition = '';
                        ulimages.style.transform = `scale(1) translateX(-${this.slideActual * 100}%)`;
                    }, 500);
                    break;
                default:
                    ulimages.style.transform = `translateX(-${this.slideActual * 100}%)`;
            }
            
            this.actualizarIndicador(ulindi, this.slideActual);
        }, 4000);
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
        let ulimages = document.querySelector(".images");
        const totalSlides = ulimages.children.length;
        this.slideActual = (this.slideActual + 1) % totalSlides;
        ulimages.style.transform = `translateX(-${this.slideActual * 100}%)`;
        this.actualizarIndicador(document.querySelector('.indicators'), this.slideActual);
    }
    
    prevImage() {
        let ulimages = document.querySelector(".images");
        const totalSlides = ulimages.children.length;
        this.slideActual = (this.slideActual - 1 + totalSlides) % totalSlides;
        ulimages.style.transform = `translateX(-${this.slideActual * 100}%)`;
        this.actualizarIndicador(document.querySelector('.indicators'), this.slideActual);
    }
}

