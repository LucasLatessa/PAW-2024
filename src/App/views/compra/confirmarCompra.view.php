<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Confirmar pedido - PAW Power</title>
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
      <form>
        <h1>Estas a un paso de terminar la compra</h1>
        <ul>
          <li>
            <p>Nombre</p>
            <p>Descripcion</p>
            <p>Precio</p>
            <p>Notas</p>
            <p>Cantidad: ...</p>
          </li>
          <li>
            <p>Nombre2</p>
            <p>Descripcion2</p>
            <p>Precio2</p>
            <p>Notas</p>
            <p>Cantidad: ...</p>
          </li>
        </ul>
        <h2>Forma de pago: ...</h2>
        <h2>Enviar a/Retirar por: ...</h2>
        <h2>Total:$$$</h2>
        <a>Confirmar pedido</a>
      </form>
      <a href="./carrito">Volver al carrito</a>
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
