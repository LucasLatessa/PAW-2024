<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/compra.css" />
  <link rel="stylesheet" href="/assets/styles/formularios.css">
  <script src="/assets/js/components/paw.js"></script>
  <script src="/assets/js/appReservas.js"></script>
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <main>
    <!---CARRUSEL RESERVA -->
    <section class="carrusel_reserva">
      <h2>Reservas</h2>
    </section>

    <div id="formularioReserva" class="form-reserva-div">
      <form method="POST" action="" class="form-reserva">

        <label for="listaLocales">Seleccionar Local*</label>
        <select  name="listaLocales" id="listaLocales" required>
          <option value="Local 1">Local 1</option>
          <option value="Local 2">Local 2</option>
        </select>

        <label>Cantidad de Personas*
          <input type="number" name="cantidadPersonas" min="1" required />
        </label>

        <label>Día de la Reserva*
          <input type="date" id="fecha-reserva" name="dia" required />
        </label>

        <label for="listaHorarios">Horario de la Reserva*</label>
        <select name="listaHorarios" id="listaHorarios" requerid>
          <option value="">Selecciona un horario</option>
          <option value="08:00">08:00</option>
          <option value="10:00">10:00</option>
        </select>

        <!--Modificar por contenedor del svg -->
        <img id="planoSurcursal" class="planoSucursal" src="../assets/planos/PlanoSucursalA.svg" alt="">

        <label>Mesa
          <input class="listaMesas" list="listaMesas" name="mesa" required readonly />
        </label>

        <label for="inputTexto">Aclaraciones
          <input id="inputTexto" type="text" name="aclaraciones" maxlength="500" minlength="5" size="30" />
        </label>



        <p id="required">*requerido</p>
        <button type="submit">Reservar Mesa</button>
      </form>
    </div>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>