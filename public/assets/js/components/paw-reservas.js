class PAWReservas {
  constructor(svg) {
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
        const code = state.getAttribute("id");
        console.log(code);
      };
    } else { //En el caso de que no exista el SVG
      console.log("No existe");
    }
  }
}
