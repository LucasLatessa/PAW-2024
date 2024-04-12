<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Pedir - PAW Power</title>
    <link rel="icon" href="../assets/Isotipo.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../styles/header-footer.css">
    <link rel="stylesheet" href="../styles/compra.css" />
  </head>
  <body>
    <!--HEADER-->
    <header class="header-principal">
      <nav class="menu">
        <img src="../assets/MenuBurger.png" class="icono-menu" />
        <ul class="lista-desplegable">
          <li><a href="../compra/menu.html">Menu</a></li>
          <li><a href="../compra/reserva.html">Reservar mesa</a></li>
          <li class="header-derecha">
            <a href="../cuenta/perfil.html">Perfil</a>
          </li>
          <!--provisorio luego va a ser el mismo boton que actua dependiendo de si estas logueado-->
          <li></li>
        </ul>
      </nav>
      <h1>
        <a href="../index.html">
          <img src="../assets/Imagotipo.svg" alt="Paw Power" class="logo" />
        </a>
      </h1>
      <a href="../compra/carrito.html"
        ><img src="../assets/carrito.png" alt="Carrito" class="icono-carrito"
      /></a>
      <a href="../cuenta/login.html"
        ><img src="../assets/user.png" alt="Usuario" class="icono-usuario"
      /></a>
    </header>
    
    <main>
      <!--Codigo comida-->
      <header class="header-menu menu-background">
        <h1 class="menu-titulo">Menu</h1>
      </header>
      
      <section>
        <h2 class="comida-seleccionada">Nombre comida seleccionada</h2>
        <figure class="figura-comida-seleccionada">
          <img class="img-comida-seleccionada"
            src="../assets/Hamburguesa.jpg"
            alt="Comida seleccionada para pedir"
            width="500"
          />
          <figcaption>descripcion</figcaption>
        </figure>
      </section>

      <div class="formularioPedidoComida">
        <form method="POST">
          <h3>Quieres agregar alguna salsa?</h3>
          <label for="inputSalsaBBQ">
            BBQ
            <input type="checkbox" name="bbq" id="inputSalsaBBQ" value="BBQ" />
          </label>
          <p class="precio">$$$</p>
          <label for="inputSalsaMostaza">
            MOSTAZA
            <input
              type="checkbox"
              name="mostaza"
              id="inputSalsaMostaza"
              value="Mostaza"
            />
          </label>
          <p class="precio">$$$</p>
          <label for="inputTexto">
            Aclaraciones
            <input
              id="inputTexto"
              type="text"
              name="inputTexto"
              maxlength="500"
              minlength="5"
              size="30"
            />
          </label>
          <label class="cantidad-producto"
            >Cantidad*
            <!--Con javascript sera un contador-->
            <input type="number" min="1" required />
          </label>
          <p class="precio total">$$$$$$$$$$</p>
        </form>
        <button type="submit">Pedir</button>
      </div>
    </main>

    <!--FOOTER-->
    <footer style="background-color: aliceblue">
     
      <nav class = "contenedor-links">
        <ul class="links" >
          <li id = "locales"><a href="../institucional/locales.html">Locales</a></li>
          <li id = "Servicio-al-cliente"><a href="../institucional/servCliente.html">Servicio al cliente</a></li>
          <li id = "Sobre-nosotros"><a href="../institucional/nosotros.html">Sobre nosotros</a></li>
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
