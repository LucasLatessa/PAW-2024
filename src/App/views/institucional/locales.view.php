<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/institucional.css">
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <h1 class="header-institucional locales">Locales</h1>
  <iframe name="maps" loading="lazy" allowfullscreen
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3921.882402661696!2d-76.99068508464688!3d-12.141450291419272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8367e5e3851%3A0xa25aee6eef29f4b9!2sPlaza%20de%20Armas%20de%20Lima!5e0!3m2!1ses-419!2spe!4v1647631886452!5m2!1ses-419!2spe"></iframe>
  <ul class="lista-locales">
    <li>
      <strong>Nombre del Local 1</strong>
      <p>Dirección del Local 1</p>
      <a href="../reserva">Reservar Mesa</a>
    </li>
    <li>
      <strong>Nombre del Local 2</strong>
      <p>Dirección del Local 2</p>
      <a href="../reserva">Reservar Mesa</a>
    </li>
    <li>
      <strong>Nombre del Local 3</strong>
      <p>Dirección del Local 3</p>
      <a href="../reserva">Reservar Mesa</a>
    </li>
    <li>
      <strong>Nombre del Local 4</strong>
      <p>Dirección del Local 4</p>
      <a href="../reserva">Reservar Mesa</a>
    </li>
  </ul>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>