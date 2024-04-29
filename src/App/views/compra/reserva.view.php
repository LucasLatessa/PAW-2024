<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/compra.css" />
  <link rel="stylesheet" href="/assets/styles/formularios.css">
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <main>
    <!---CARRUSEL RESERVA -->
    <section class="carrusel_reserva">
      <h2>Reservas</h2>
      <ul>
        <li>
          <a href="../institucional/locales">
            <img src="../assets/local1.jpg" alt="Local 1 - PAW POWER">
          </a>
        </li>
        <li>
          <a href="../institucional/locales">
            <img src="../assets/local2.jpg" alt="Local 2 - PAW POWER">
          </a>
        </li>
        <li>
          <a href="../institucional/locales">
            <img src="../assets/local3.jpg" alt="Local 3 - PAW POWER">
          </a>
        </li>
      </ul>
    </section>

    <div id="formularioReserva" class="form-reserva-div">
      <form method="POST" action="" class="form-reserva">
        <label>Seleccionar Local* 
            <input list="listaLocales" name="local" required />
        </label>
        <datalist id="listaLocales">
            <option value="Local 1"></option>
            <option value="Local 2"></option>
        </datalist>

        <label>Cantidad de Personas*
            <input type="number" name="cantidadPersonas" min="1" required />
        </label>

        <label>Día de la Reserva*
            <input type="date" name="dia" required />
        </label>
        <label>Horario de la Reserva* 
            <input list="listaHorarios" name="horario" required />
        </label>
        <datalist id="listaHorarios">
            <option value="12:00 PM - 3:00 PM"></option>
            <option value="7:00 PM - 10:00 PM"></option>
        </datalist>

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