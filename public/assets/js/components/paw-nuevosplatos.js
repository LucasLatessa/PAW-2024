class PAWReservas {
    constructor() {
        //Obtengo el label (caja donde se guardara la imagen)
        const dropArea = document.getElementById("imagen-drop");
        //console.log(dropArea);
        //Obtengo el input donde se cargara el archivo
        const inputFile = document.getElementById("imagen-drop-input");

        //Cada vez que se produzca un cambio en el input, ejecuta cargarImagen
        inputFile.addEventListener("change",cargarImagen);

        //Cargo la imagen
        this.cargarImagen()

        //DragOver se activa cuando el mouse se mueve sobre un elemento cuando se tiene una operacion de arrastre
        dropArea.addEventListener("dragover", function(e) {
            e.preventDefault();  //Evito realizar la accion predeterminada
        })

        //Drop funciona cuando el usuario uselta la imagen
        dropArea.addEventListener("drop", function(e) {
            e.preventDefault();
            //Cargo el archivo en el input
            inputFile.files = e.dataTransfer.files;
            //Ejecuto cargar imagen
            cargarImagen();
        })
    }

    //Cargo la imagen y la pongo como fondo
    cargarImagen(){
        //Creo la Url de la imagen y la pongo de fondo
        let imgLink = URL.createObjectURL(inputFile.files[0]);
        inputFile.style.backgroundImage = `url(${imgLink})`;
    }

}