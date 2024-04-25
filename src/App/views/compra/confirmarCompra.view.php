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
    <form>
      <h1>Estas a un paso de terminar la compra</h1>
      <ul>
        <li>
          <p>Nombre</p>
          <p>Descripcion</p>
          <p>Precio</p>
          <p>Notas</p>
          <p>Cantidad: ...</p>
        </li>
        <li>
          <p>Nombre2</p>
          <p>Descripcion2</p>
          <p>Precio2</p>
          <p>Notas</p>
          <p>Cantidad: ...</p>
        </li>
      </ul>
      <h2>Forma de pago: ...</h2>
      <h2>Enviar a/Retirar por: ...</h2>
      <h2>Total:$$$</h2>
      <a>Confirmar pedido</a>
    </form>
    <a href="./carrito">Volver al carrito</a>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>