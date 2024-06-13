class PAWReservas {
  constructor(svg, listaReservas) {
    //Obtengo el svg (que esta como imagen)
    //console.log(listaReservas);
    let contenedor = svg.tagName ? pContenedor : document.querySelector(svg);
    let mesaSeleccionada = null;

    const hoy = new Date();
    const fechaFormateada = hoy.toISOString().split("T")[0];
    let hora = (document.getElementById("fecha-reserva").value =
      fechaFormateada);

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
      /* MANEJAR ERRORES QUE SEAN AMIGABLES PARA EL USUARIO */

      //Obtengo todos los elementos que sean g y comienzen con mesa (ya que solamente esto se podra reservar)
      const getActions = () => {
        const states = document.getElementsByTagName("g");
        for (let i = 0; i < states.length; i++) {
          const element = states[i];
          if (element.id.startsWith("mesa") || element.id.startsWith("barra")) {
            //Si se da click al elemento, ejecuto el stateClicked para obtener el id
            element.onclick = () => {
              stateClicked(element);
            };
          }
        }
      };

      /*OBTENGO TODAS LAS MESAS OCUPADAS*/
      let reservas = [];
      //Cargo la lista de reservas
      const getReservas = () => {
        fetch(listaReservas)
          .then((response) => response.json())
          .then((data) => {
            console.log(data);
            reservas = [];
            reservas.push(...data);
            mesasOcupadas(reservas); /*SOLUCIONAR: Problema con mesas ocupadas*/
          });
      };

      getReservas();

      const mesasOcupadas = (misReservas) => {
        console.log(misReservas);
        const elementosMesa = [];
        const reservaDia = []; // se puede mejorar con json?
        const diaReserva = document.querySelector("input[name='dia']");
        const horarioReserva = document.querySelector("input[name='horario']");

        //Pinta las mesas ocupadas
        for (let i = 0; i < reservas.length; i++) {
          const mesa = document.getElementById(reservas[i].mesa);
          console.log(mesa);
          const agarroMesa = mesa.querySelectorAll("*");
          console.log(agarroMesa);
          reservaDia.push(reservas[i].dia);
          elementosMesa.push(agarroMesa);
          agarroMesa.classList.remove("ocupado", "mesa");
          agarroMesa.classList.add("mesa");
        }
        for (let i = 0; i < elementosMesa.length; i++) {
          if (reservaDia[i] == diaReserva.value) {
            elementosMesa[i].classList.add("ocupado");
          }
        }
      };

      mesasOcupadas(reservas);
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
    } else {
      //En el caso de que no exista el SVG
      console.log("No existe");
    }

    //Obtengo el id de la mesa, que me servira para las reservas
    const stateClicked = (state) => {
      // Verificar si la mesa está ocupada
      if (state.classList.contains('ocupada')) {
        alert('Esta mesa está ocupada y no se puede seleccionar.');
        return;
      }

      //Borro los datos de la mesa anterior
      if (this.mesaSeleccionada) {
        const mesaAnterior = this.mesaSeleccionada.querySelectorAll("*");
        mesaAnterior.forEach((elemento) => {
          elemento.removeAttribute('id');
        });
      }

      //Obtengo el id de la mesa
      const code = state.getAttribute("id");

      //Obtengo el valor del formulario que indica la mesa seleccionada
      const nombreMesa = document.querySelector(".listaMesas");
      //Cambio la mesa que selecciono
      nombreMesa.value = code;

      /*Tengo que pintar la mesa en amarillo*/
      const mesa = document.getElementById(code);
      const agarroMesa = mesa.querySelectorAll("*");
      agarroMesa.forEach((elemento) => {
        elemento.setAttribute('id', 'seleccionada');
      });

      // Actualizar la mesa seleccionada
      this.mesaSeleccionada = mesa;
    };
  }
}
