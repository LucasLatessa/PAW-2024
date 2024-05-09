class PAWReservas {
  constructor(svg, listaReservas) {
    //Obtengo el svg (que esta como imagen)
    let contenedor = svg.tagName ? pContenedor : document.querySelector(svg);

    if (contenedor) {
      //Cargo el SVG (reemplazando el img)
      fetch(contenedor.src)
        .then((response) => response.text())
        .then((response) => {
          const span = document.createElement("span");
          span.innerHTML = response;
          const inlineSvg = span.getElementsByTagName("svg")[0];
          contenedor.parentNode.replaceChild(inlineSvg, contenedor);
        })
        .then(() => {
          getActions();
        });

      //Obtengo todos los elementos que sean g y comienzen con mesa (ya que solamente esto se podra reservar)
      const getActions = () => {
        const states = document.getElementsByTagName("g");
        for (let i = 0; i < states.length; i++) {
          const element = states[i];
          if (element.id.startsWith("mesa")) {
            //Si se da click al elemento, ejecuto el stateClicked para obtener el id
            element.onclick = () => {
              stateClicked(element);
            };
          }
        }
      };

      //Obtengo el id de la mesa, que me servira para las reservas
      const stateClicked = (state) => {
        //Obtengo el id de la mesa
        const code = state.getAttribute("id");
        //Obtengo el valor del formulario que indica la mesa seleccionada
        const nombreMesa = document.querySelector(".listaMesas");
        //Cambio la mesa que selecciono
        nombreMesa.value = code;
      };

      /*OBTENGO TODAS LAS MESAS OCUPADAS*/
      const reservas = [];

      //Cargo la lista de reservas
      const getReservas = () => {
        fetch(listaReservas)
          .then((response) => response.json())
          .then((data) => {
            reservas.push(...data);
            mesasOcupadas(reservas); /*SOLUCIONAR: Problema con mesas ocupadas*/
          });
      };

      getReservas();
      //console.log(reservas);

      /*PINTAR MESAS OCUPADAS*/
      const mesasOcupadas = (misReservas) => {
        const diaReserva = document.querySelector("input[name='dia']");
        //const diaReserva = "20/05/2024";
        const horarioReserva = document.querySelector("input[name='horario']");

        //Pinta las mesas ocupadas
        for (let i = 0; i < reservas.length; i++) {
          const mesa = document.getElementById(reservas[i].mesa);
          const elementosMesa = mesa.querySelectorAll("*");

          if (reservas[i].dia == diaReserva.value) {
            // Obtener todos los elementos dentro del grupo SVG
            // Iterar sobre cada elemento y piso los estilos que tiene
            elementosMesa.forEach((elemento) => {
              elemento.classList.add("ocupado");
              elemento.classList.remove("mesa");
            });
          } else {
            elementosMesa.forEach((elemento) => {
              elemento.classList.remove("ocupado");
              elemento.classList.add("mesa");
            });
          }
        }
      };

      //mesasOcupadas();
      // Agregar un evento 'change' al elemento diaReserva
      // diaReserva.addEventListener("change", function (event) {
      //   // La función se ejecutará cuando el valor del input cambie
      //   console.log("El valor del input ha cambiado a:", event.target.value);
      //   // Aquí puedes agregar más acciones que desees realizar cuando cambie el valor del input
      // });
      //console.log(diaReserva);

      const diaReserva = document.querySelector("input[name='dia']");
      //console.log(diaReserva)
      diaReserva.addEventListener("change", function (event) {
        console.log("El valor del input ha cambiado a:", event.target.value);
        getReservas();
      });

      /*
    g[id^="mesa-"]:hover .mesa {
      fill: #ffaf10;
      cursor: pointer;
    } 
    */
    } else {
      //En el caso de que no exista el SVG
      console.log("No existe");
    }
  }
}
