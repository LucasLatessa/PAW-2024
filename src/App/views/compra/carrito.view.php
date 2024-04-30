<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/compra.css" />
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <main>
    <header class="header-menu carrito-background">
      <h1>Carrito de Compras</h1>
    </header>
    <form class="formulario-carrito" method="POST" action="/compra/confirmarCompra">
      <table class="tabla-carrito">
        <caption>
          Mis productos
        </caption>
        <tbody>
          <tr>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Precio</td>
            <td>Notas</td>
            <td>Cantidad</td>
            <td>Borrar</td>
          </tr>

          <tr>
            <td>Nombre2</td>
            <td>Descripcion2</td>
            <td>Precio2</td>
            <td>Notas2</td>
            <td>Cantidad2</td>
            <td>Borrar2</td>
          </tr>
        </tbody>
      </table>

      <section class="forma-de-pago">
        <h3>Forma de pago</h3>

        <input type="radio" id="efectivo" name="pago" value="efectivo" />
        <label for="efectivo">Efectivo</label>
        <input type="radio" id="tarjeta" name="pago" value="tarjeta" />
        <label for="tarjeta">Tarjeta</label>
      </section>

      <section class="tipo-entrega">

        <h3>Forma de entrega</h3>

        <input type="radio" id="takeaway" name="envio" value="Take Away" />
        <label for="takeaway">Take Away</label>
        <input type="radio" id="delivery" name="envio" value="Delivery" />
        <label for="delivery">Delivery</label>
        <?php if (isset($local)): ?>
        <p>Local: <?php echo $local; ?></p>
        <?php else: ?>
          <a href="./selecLoc">Seleccionar local</a>
        <?php endif; ?>
        <?php if (isset($direc)): ?>
        <p>Direccion: <?php echo $direc; ?></p>
        <?php else: ?>
          <a href="./selecDirec">Seleccionar direccion</a>
        <?php endif; ?>
        

      </section>

      <h2 class="subtotal">Subtotal:$$$</h2>
      <button class="realizar-pedido" type="submit" >
        Realizar pedido
      </button>

    </form>
    <a href="./menu">Volver al menu</a>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>