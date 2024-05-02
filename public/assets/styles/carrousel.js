document.addEventListener("DOMContentLoaded", function() {
    const imagesContainer = document.querySelector('.images');
    const images = document.querySelectorAll('.images img');
    const imageWidth = images[0].clientWidth;
    const indicatorsContainer = document.querySelector('.indicators');
    let indexActual = 0;

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

    function showImage(index) {
        indexActual = index;
        imagesContainer.style.transform = `translateX(-${imageWidth * index}px)`;
        updateIndicators();
    }

    // creando indicadores de puntos por cada imagen
    images.forEach((image, index) => {
        const indicator = document.createElement('li');
        indicator.setAttribute('index', index);
        indicatorsContainer.appendChild(indicator);
        indicator.addEventListener('click', () => {
            const index = parseInt(indicator.getAttribute('index'));
            showImage(index);
        });
    });
    updateIndicators();// carga los indicadores de abajo de las imágenes

    setInterval(nextImage, 5000); // cambia cada 5 segundos
});