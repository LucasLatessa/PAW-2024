<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Reservar en PAW Power</title>
    <link rel="icon" href="../assets/Isotipo.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../styles/header-footer.css">
    <link rel="stylesheet" href="../styles/compra.css" />
    <link rel="stylesheet" href="../styles/formularios.css">
  </head>
  <body>
    <!--HEADER-->
    <header class="header-principal">
      <nav class="menu">
        <img src="../assets/MenuBurger.png" class="icono-menu" />
        <ul class="lista-desplegable">
          <li><a href="../compra/menu">Menu</a></li>
          <li><a href="../compra/reserva">Reservar mesa</a></li>
          <li class="header-derecha">
            <a href="../cuenta/perfil">Perfil</a>
          </li>
          <!--provisorio luego va a ser el mismo boton que actua dependiendo de si estas logueado-->
          <li></li>
        </ul>
      </nav>
      <h1>
        <a href="/">
          <img src="../assets/Imagotipo.svg" alt="Paw Power" class="logo" />
        </a>
      </h1>
      <a href="../compra/carrito"
        ><img src="../assets/carrito.png" alt="Carrito" class="icono-carrito"
      /></a>
      <a href="../cuenta/login"
        ><img src="../assets/usuario.png" alt="Usuario" class="icono-usuario"
      /></a>
    </header>
    
    <main>
       <!---CARRUSEL RESERVA -->
      <section class="carrusel_reserva">
        <h2>Reservas</h2>
        <ul>
          <li>
            <a href="../institucional/locales"> 
              <img src="../assets/local1.jpg" alt="Local 1 - PAW POWER">
            </a>
          </li>
          <li>
            <a href="../institucional/locales"> 
              <img src="../assets/local2.jpg" alt="Local 2 - PAW POWER">
            </a>
          </li>
          <li>
            <a href="../institucional/locales"> 
              <img src="../assets/local3.jpg" alt="Local 3 - PAW POWER">
            </a>
          </li>
        </ul>
      </section>

      <div id="formularioReserva" class="form-reserva-div">
        <form class="form-reserva">
          <label
            >Seleccionar Local* <input list="listaLocales" required
          /></label>
          <datalist id="listaLocales">
            <option value="Local 1"></option>
            <option value="Local 2"></option>
          </datalist>

          <label
            >Cantidad de Personas*
            <input type="numeroPersonas" min="1" required />
          </label>

          <label
            >Día de la Reserva*
            <input type="date" required />
          </label>
          <label
            >Horario de la Reserva* <input list="listaHorarios" required
          /></label>
          <datalist id="listaHorarios">
            <option value="12:00 PM - 3:00 PM"></option>
            <option value="7:00 PM - 10:00 PM"></option>
          </datalist>

          <label id="lInputTexto" for="inputTexto">
            Aclaraciones
            <input
              id="inputTexto"
              type="textAclaraciones"
              name="inputTexto"
              maxlength="500"
              minlength="5"
              size="30"
            />
          </label>
          <p id="required">*requerido</p>
          <button type="submit">Reservar Mesa</button>
        </form>
      </div>
    </main>

    <!--FOOTER-->
    <footer style="background-color: aliceblue">
     
      <nav class = "contenedor-links">
        <ul class="links" >
          <li id = "locales"><a href="../institucional/locales">Locales</a></li>
          <li id = "Servicio-al-cliente"><a href="../institucional/servCliente">Servicio al cliente</a></li>
          <li id = "Sobre-nosotros"><a href="../institucional/nosotros">Sobre nosotros</a></li>
        </ul>
      </nav>
      
      <nav>
        <ul class="redes">
          <li id = "youtube">
            <a href="#" rel="external" target="_blank"
              ><img src="../assets/youtube.png" alt="Youtube" width="50"
            /></a><!-- icono pone css  borrar -->
          </li>
          <li id = "facebook">
            <a href="#" rel="external" target="_blank"
              ><img src="../assets/facebook.png" alt="Facebook" id = "facebook" width="50"
            /></a><!-- icono pone css  borrar -->
          </li>
          <li id = "x">
            <a href="#" rel="external" target="_blank"><img src="../assets/x.png" alt="X" width="50" /></a>
          </li>
          <li id = "instagram">
            <a href="#" rel="external" target="_blank"
              ><img src="../assets/instagram.png" alt="Instagram" width="50"
            /></a><!-- icono pone css  borrar -->
          </li>
        </ul>
      </nav>
      

      <small id="copyright">
        <em>Copyright PAW Power @2024. Todos los derechos reservados.</em> 
    </small>
    </footer>
  </body>
</html>