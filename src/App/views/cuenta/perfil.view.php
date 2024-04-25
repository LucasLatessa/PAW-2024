<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/formularios.css">

  <link rel="stylesheet" href="/assets/styles/cuentas.css" />
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <main>
    <h1>Perfil</h1>
    <div id="infoUsuario">
      <label for="email">Correo Electrónico
        <input type="email" id="email" name="email" value="test" />
      </label><!--esto va a contener los datos actuales -->

      <label for="nombre">Nombre
        <input type="text" id="nombre" name="nombre" value="test" required />
      </label><!--esto va a contener los datos actuales -->

      <label for="apellido">Apellido
        <input type="text" id="apellido" name="apellido" value="test" required />
      </label><!--esto va a contener los datos actuales -->

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
        <a href="./agregarDireccion">Editar Direccion</a><!--simil al agregar, pero con los datos viejos (Update) -->
      </div>
      <div class="direccion">
        <p>Pais: Argentina</p>
        <p>Provincia: Buenos Aires</p>
        <p>Ciudad/barrio: Lujan</p>
        <p>CCPP: 6700</p>
        <p>Direccion: 123</p>
        <p>Aclaraciones: Nada</p>
        <a href="./agregarDireccion">Editar Direccion</a><!--simil al agregar, pero con los datos viejos (Update) -->
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
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>