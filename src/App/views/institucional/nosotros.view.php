<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Sobre PAW Power</title>
    <link rel="icon" href="../assets/Isotipo.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../styles/header-footer.css">
    <link rel="stylesheet" href="../styles/institucional.css" />
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
      <header class="header-institucional sobre-nosotros">
        <h1>SOBRE NOSOTROS</h1>
      </header>

      <p class="p-institucional">
        En Paw Power, más que una simple hamburguesería, somos un equipo comprometido con la excelencia culinaria y la satisfacción del cliente.
      </p>

      <section class="misionesValores">
        <h2>Misiones y valores</h2>
        <p class="p-institucional">
          Nuestra misión es crear un ambiente acogedor y familiar donde nuestros clientes puedan disfrutar de
          deliciosas comidas, excelente servicio y momentos memorables con amigos y familiares. Nos comprometemos 
          a mantener altos estándares de calidad en todos los aspectos de nuestro negocio, desde la selección de 
          ingredientes hasta el servicio al cliente, con el fin de superar las expectativas y convertirnos en el destino 
          preferido de los amantes de las hamburguesas en todas nuestras sedes y canales de servicio.
        </p>
        <p class="p-institucional">
          Calidad: Nos comprometemos a utilizar ingredientes frescos y de alta calidad en la preparación de nuestras 
          hamburguesas y acompañamientos, asegurando así la satisfacción y el deleite de nuestros clientes en cada bocado.
        </p>
        <p class="p-institucional">
        Integridad: Nos comprometemos a operar de manera ética y transparente en todos los aspectos de nuestro negocio, 
        manteniendo la confianza de nuestros clientes, empleados y comunidades en las que operamos.
       </p>  
        </section>

      <section class="equipoTrabajo">
        <h2>Equipo de trabajo</h2>
        <p class="p-institucional">
          Nuestro equipo está formado por profesionales apasionados y comprometidos que comparten nuestra visión de ofrecer
           experiencias gastronómicas excepcionales. Desde nuestros expertos cocineros hasta nuestro amable personal de servicio,
            cada miembro desempeña un papel fundamental en nuestro éxito. Trabajamos juntos con pasión y dedicación para superar las 
            expectativas de nuestros clientes en todas nuestras sedes y canales de servicio.
        </p>
      </section>
      <!--CODIGO DE SOBRE NOSOTROS-->
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
