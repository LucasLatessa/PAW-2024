<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/global.css" />
  <link rel="stylesheet" href="/assets/styles/direccion_local.css">
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <main>
    <h1>Seleccionar local</h1>
    <iframe name="maps" width="900" height="450" loading="lazy" allowfullscreen
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3921.882402661696!2d-76.99068508464688!3d-12.141450291419272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8367e5e3851%3A0xa25aee6eef29f4b9!2sPlaza%20de%20Armas%20de%20Lima!5e0!3m2!1ses-419!2spe!4v1647631886452!5m2!1ses-419!2spe"></iframe>

    <form method="POST" action="">
      <label for="local1">Local 1 - Direccion
        <input type="radio" id="local1" name="local" value="Local 1" checked /></label>
      <label for="local2">Local 2 - Direccion
        <input type="radio" id="local2" name="local" value="Local 2" /></label>

      <button type="submit">
        Seleccionar local
        <!-- Redireccion a carrito con JS -->
      </button>

      <?php if (isset($errorMessage)): ?>
          <p><?= $errorMessage ?></p>
      <?php endif; ?>

    </form>

    <a class="btn" href="./carrito">Volver al carrito</a>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>