//Se dispara cuando termina de cargar el HTML
document.addEventListener("DOMContentLoaded", function() {
    const imagesContainer = document.querySelector('.images'); //Ol
    const images = document.querySelectorAll('.images img'); //Imagenes individuales
    const imageWidth = images[0].clientWidth; //Tamaño de la primera imagen
    const indicatorsContainer = document.querySelector('.indicators'); //Indicadores (globitos abajo de la imagen)
    let indexActual = 0;

    //Indica cual es el indicador activo que se va a mostrar en pantalla
    function updateIndicators() {
        const indicators = document.querySelectorAll('.indicators li');
        indicators.forEach((indicator, index) => {
            if (index === indexActual) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    }

    function nextImage() {
        indexActual = (indexActual + 1) % images.length;//modulo % para calcular el indice de la siguiente imagen
        showImage(indexActual);
    }

    function prevImage() {
        indexActual = (indexActual - 1 + images.length) % images.length;
        showImage(indexActual);
    }

    //Dado el indice, se muestra la imagen
    function showImage(index) {
        indexActual = index;
        // desplazar el contenedor de images para mostrar la prox imagen
        imagesContainer.style.transform = `translateX(-${imageWidth * index}px)`;
        updateIndicators();
    }

    // creando indicadores de puntos por cada imagen
    images.forEach((image, index) => {
        const indicator = document.createElement('li');
        indicator.setAttribute('index', index);
        indicatorsContainer.appendChild(indicator);
        //event listener para cuando se hace click en un indicador
        indicator.addEventListener('click', () => {
            const index = parseInt(indicator.getAttribute('index'));
            showImage(index);
        });
    });
    updateIndicators();// carga los indicadores de abajo de las imágenes

    setInterval(nextImage, 5000); // cambia cada 5 segundos
});