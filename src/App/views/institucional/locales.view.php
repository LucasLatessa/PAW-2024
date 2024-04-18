<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Locales - PAW Power</title>
    <link rel="icon" href="../assets/Isotipo.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../styles/header-footer.css">
    <link rel="stylesheet" href="../styles/institucional.css">
  </head>
  <body>
    <!--HEADER-->
    <header class="header-principal">
      <?php require '../parts/header.view.php'; ?> <!-- PROBLEMA DIRECTORIOS -->
    </header>

    <main>
      <h1 class="header-institucional locales">Locales</h1>
      <iframe
        name="maps"
        loading="lazy"
        allowfullscreen
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3921.882402661696!2d-76.99068508464688!3d-12.141450291419272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8367e5e3851%3A0xa25aee6eef29f4b9!2sPlaza%20de%20Armas%20de%20Lima!5e0!3m2!1ses-419!2spe!4v1647631886452!5m2!1ses-419!2spe"
      ></iframe>
      <ul class="lista-locales">
        <li>
          <strong>Nombre del Local 1</strong>
          <p>Dirección del Local 1</p>
          <a href="../compra/reserva">Reservar Mesa</a>
        </li>
        <li>
          <strong>Nombre del Local 2</strong>
          <p>Dirección del Local 2</p>
          <a href="../compra/reserva">Reservar Mesa</a>
        </li>
        <li>
          <strong>Nombre del Local 3</strong>
          <p>Dirección del Local 3</p>
          <a href="../compra/reserva">Reservar Mesa</a>
        </li>
        <li>
          <strong>Nombre del Local 4</strong>
          <p>Dirección del Local 4</p>
          <a href="../compra/reserva">Reservar Mesa</a>
        </li>
      </ul>
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
