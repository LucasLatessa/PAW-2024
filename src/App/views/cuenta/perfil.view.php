<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Perfil</title>
    <link rel="icon" href="../assets/Isotipo.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../styles/header-footer.css">
    <link rel="stylesheet" href="../styles/formularios.css">
    
    <link rel="stylesheet" href="../styles/cuentas.css" />
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
      <h1>Perfil</h1>
      <div id="infoUsuario">
        <label for="email"
          >Correo Electrónico
          <input type="email" id="email" name="email" value="test" /> </label
        ><!--esto va a contener los datos actuales -->

        <label for="nombre"
          >Nombre
          <input
            type="text"
            id="nombre"
            name="nombre"
            value="test"
            required
          /> </label
        ><!--esto va a contener los datos actuales -->

        <label for="apellido"
          >Apellido
          <input
            type="text"
            id="apellido"
            name="apellido"
            value="test"
            required
          /> </label
        ><!--esto va a contener los datos actuales -->

        <input type="submit" value="Actualizar" />
      </div>
      
      <h2>Direcciones</h2>
      <section class="direcciones">
        <div class="direccion">
          <p>Pais: Argentina</p>
          <p>Provincia: Buenos Aires</p>
          <p>Ciudad/barrio: Chivilcoy</p>
          <p>CCPP: 6620</p>
          <p>Direccion: 123</p>
          <p>Aclaraciones: Nada</p>
          <a href="./agregarDireccion">Editar Direccion</a
          ><!--simil al agregar, pero con los datos viejos (Update) -->
        </div>
        <div class="direccion">
          <p>Pais: Argentina</p>
          <p>Provincia: Buenos Aires</p>
          <p>Ciudad/barrio: Lujan</p>
          <p>CCPP: 6700</p>
          <p>Direccion: 123</p>
          <p>Aclaraciones: Nada</p>
          <a href="./agregarDireccion">Editar Direccion</a
          ><!--simil al agregar, pero con los datos viejos (Update) -->
        </div>
        <a href="./agregarDireccion">Agregar Direccion</a>
      </section>
      <h2>Pedidos</h2>
      <section class="pedidos">
        
        <div class="pedido">
          <p>Fecha: 13 de marzo de 2024</p>
          <p>Total pagado: $50.00</p>
          <p>ID de pedido: 123456</p>
          <button>Ver detalles</button>
        </div>

        <div class="pedido">
          <p>Fecha: 12 de marzo de 2024</p>
          <p>Total pagado: $35.00</p>
          <p>ID de pedido: 789012</p>
          <button>Ver detalles</button>
        </div>
      </section>
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
