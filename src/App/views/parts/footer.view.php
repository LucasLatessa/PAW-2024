<!--FOOTER-->
<footer>
  <nav class="contenedor-links">
    <ul class="links">

      <?php
      foreach ($this->rutasFooter as $item): ?>

        <li><a href="<?= $item["href"] ?>"> <?= $item["name"] ?></a></li>

      <?php endforeach; ?>


      <!--<li id="locales">
          <a href="./institucional/locales.html">Locales</a>
        </li>
        <li id="Servicio-al-cliente">
          <a href="./institucional/servCliente.html">Servicio al cliente</a>
        </li>
        <li id="Sobre-nosotros">
          <a href="./institucional/nosotros.html">Sobre nosotros</a>
        </li>
        <li id="Consumos"> agregado para ver estilo, luego nose si va(validar si es rol administrador)
          <a href="./cuenta/consumos.html">Consumos</a>-->
      </li>
    </ul>
  </nav>

  <nav>
    <ul class="redes">
      <li id="youtube">
        <a href="#" rel="external" target="_blank"><img src="/assets/youtube.png" alt="Youtube"
            width="50" /></a><!-- icono pone css  borrar -->
      </li>
      <li id="facebook">
        <a href="#" rel="external" target="_blank"><img src="/assets/facebook.png" alt="Facebook" id="facebook"
            width="50" /></a><!-- icono pone css  borrar -->
      </li>
      <li id="x">
        <a href="#" rel="external" target="_blank"><img src="/assets/x.png" alt="X" width="50" /></a>
      </li>
      <li id="instagram">
        <a href="#" rel="external" target="_blank"><img src="/assets/instagram.png" alt="Instagram"
            width="50" /></a><!-- icono pone css  borrar -->
      </li>
    </ul>
  </nav>

  <small id="copyright">
    <em>Copyright PAW Power @2024. Todos los derechos reservados.</em>
  </small>
</footer>