<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Carrito - PAW Power</title>
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
          provisorio luego va a ser el mismo boton que actua dependiendo de si estas logueado
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
      <header class="header-menu carrito-background">
        <h1>Carrito de Compras</h1>
      </header>
      <form class="formulario-carrito">
          <table class="tabla-carrito">
            <caption>
              Mis productos
            </caption>
            <tbody>
              <tr>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td>Notas</td>
                <td>Cantidad</td>
                <td>Borrar</td>
              </tr>
    
              <tr>
                <td>Nombre2</td>
                <td>Descripcion2</td>
                <td>Precio2</td>
                <td>Notas2</td>
                <td>Cantidad2</td>
                <td>Borrar2</td>
              </tr>
            </tbody>
          </table>
        
        <section class="forma-de-pago">
          <h3>Forma de pago</h3>

          <input type="radio" id="efectivo" name="pago" value="efectivo" />
          <label for="efectivo">Efectivo</label>
          <input type="radio" id="tarjeta" name="pago" value="tarjeta" />
          <label for="tarjeta">Tarjeta</label>
        </section>

        <section class="tipo-entrega">

            <h3>Forma de entrega</h3>
    
            <input type="radio" id="takeaway" name="envio" value="Take Away" />
            <label for="takeaway">Take Away</label>
            <input type="radio" id="delivery" name="envio" value="Delivery" />
            <label for="delivery">Delivery</label>

            <a href="./selecLoc">Seleccionar local</a>
            <a href="./selecDirec">Seleccionar direccion</a>
            
        </section>
        
        <h2 class="subtotal">Subtotal:$$$</h2>
        <button class="realizar-pedido" type="submit" onclick="location.href='confirmarCompra'">
          Realizar pedido
        </button>
        
      </form>
      <a href="./menu">Volver al menu</a>
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
