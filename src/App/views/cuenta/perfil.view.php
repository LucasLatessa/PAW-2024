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

    <?php if (isset($resultado)): ?>
        <h2><?= $resultado ?></h2>
      <?php endif; ?>

    <form method="POST" id="infoUsuari" action="">
      <label for="email">Correo Electrónico
        <input type="email" id="email" name="email"
          value="<?php if (isset($email)): ?><?php echo $email; ?><?php endif; ?>" required />
      </label><!-- esto va a contener los datos actuales -->


      <label for="nombre">Nombre
        <input type="text" id="nombre" name="nombre" value="<?php if (isset($nombre)): ?><?php echo $nombre; ?><?php endif; ?>" required />
      </label><!--esto va a contener los datos actuales -->

      <label for="apellido">Apellido
        <input type="text" id="apellido" name="apellido" value="<?php if (isset($apellido)): ?><?php echo $apellido; ?><?php endif; ?>" required />
      </label><!--esto va a contener los datos actuales -->

      <input type="submit" value="Actualizar" />
    </form>
    </div>

    <h2>Direcciones</h2>
    <?php if (isset($creada)): ?>
        <h2><?= $creada ?></h2>
      <?php endif; ?>
    <section id="direcciones" class="direcciones">
      
      <article class="direccion">
        <?php if (isset($pais)): ?>
          <p>Pais: <?php echo $pais; ?></p>
        <?php endif; ?>
        <?php if (isset($provincia)): ?>
          <p>Provincia: <?php echo $provincia; ?></p>
        <?php endif; ?>
        <?php if (isset($ciudad)): ?>
          <p>Ciudad/barrio: <?php echo $ciudad; ?></p>
        <?php endif; ?>
        <?php if (isset($ccpp)): ?>
          <p>CCPP: <?php echo $ccpp; ?></p>
        <?php endif; ?>
        <?php if (isset($direc)): ?>
          <p>Direccion: <?php echo $direc; ?></p>
        <?php endif; ?>
        <?php if (isset($aclaraciones)): ?>
          <p>Aclaraciones: <?php echo $aclaraciones; ?></p>
          <a href="./agregarDireccion">Editar Direccion</a><!--simil al agregar, pero con los datos viejos (Update) -->
        <?php endif; ?>
        <!-- <p>Aclaraciones: <?php if (isset($aclaraciones)): ?><?php echo $aclaraciones; ?><?php endif; ?></p> -->
        
       
      </article>
      <article class="direccion">
        <p>Pais: Argentina</p>
        <p>Provincia: Buenos Aires</p>
        <p>Ciudad/barrio: Lujan</p>
        <p>CCPP: 6700</p>
        <p>Direccion: 123</p>
        <p>Aclaraciones: Nada</p>
        <a href="./agregarDireccion">Editar Direccion</a><!--simil al agregar, pero con los datos viejos (Update) -->
      </article>
      <?php
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        $_SESSION['origen'] = 'cuenta/perfil'; // Guardar la página de origen en una variable de sesión
      ?>
      <a href="./agregarDireccion">Agregar Direccion</a>
    </section>
    <h2>Pedidos</h2>
    <section id="pedidos" class="pedidos">

      <article class="pedido">
        <p>Fecha: 13 de marzo de 2024</p>
        <p>Pedido: #A0002</p>
        <p>Tipo: Take away</p>
        <p>Estado: Pasar a retirar</p>
        <p>Total pagado: $50.00</p>
        <button>Ver detalles</button>
      </article>

      <article class="pedido">
        <p>Fecha: 12 de marzo de 2024</p>
        <p>Pedido: #A0006</p>
        <p>Tipo: Delivery</p>
        <p>Estado: Aceptado</p>
        <p>Total pagado: $35.00</p>
        <button>Ver detalles</button>
      </article>
    </section>
    <h2>Reservas</h2>
    <section class="reservas">

      <div class="reserva">

        <?php if (isset($local)): ?><p>Local: <?php echo $local; ?></p><?php endif; ?>
        <?php if (isset($cantidadPersonas)): ?><p>Cantidad de personas: <?php echo $cantidadPersonas; ?></p><?php endif; ?>
        <?php if (isset($dia)): ?><p>Dia: <?php echo $dia; ?></p><?php endif; ?>
        <?php if (isset($horario)): ?><p>Horario: <?php echo $horario; ?></p><?php endif; ?>
        <!-- <p>Aclaraciones: <?php if (isset($aclaraciones)): ?><?php echo $aclaraciones; ?><?php endif; ?></p> -->
        
      </div>

    </section>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>