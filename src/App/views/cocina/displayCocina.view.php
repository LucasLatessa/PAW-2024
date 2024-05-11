<!DOCTYPE html>
<html lang="en">
<head>
    <?php require __DIR__ . '\../parts/head.view.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/assets/js/components/paw.js"></script>
    <script src="/assets/js/appPedidoCocina.js"></script>
    <title>Cocina - Paw Power</title>
</head>
<body>
    <main>
    <header class="header-principal">
            <?php $home = $this->rutasLogoHeader ?>
            <a href=" <?= $home["href"] ?>">
                <img src="../assets/Imagotipo-blanco.png" alt="Paw Power" class="logo" />
            </a>
    </header>
    <section class="display-takeaway">
    <h2>Take away</h2>
    <table>
        <tr>
            <th class="head-pedido">Pedido</th>
            <th class="head-hora">Hora llegada</th>
            <th class="head-nombre">Nombre</th>
            <th class="head-ingredientes">Ingredientes</th>
            <th class="head-aclaraciones">Aclaraciones</th>
        </tr>
        <!--<tr>
            <td>1</td>
            <td>10:00</td>
            <td>Hamburguesa Simple</td>
            <td>Carne, Lechuga, Tomate</td>
            <td>Sin cebolla</td>
        </tr>
        <tr>
            <td>2</td>
            <td>10:15</td>
            <td>Hamburguesa Doble</td>
            <td>Carne, Lechuga, Tomate, Queso</td>
            <td>Sin pepinillos</td>
        </tr>-->
    </table>
    </section>
    <section class="display-delivery">
    <h2>Delivery</h2>
    <table>
        <tr>
            <th class="head-pedido">Pedido</th>
            <th class="head-hora">Hora llegada</th>
            <th class="head-nombre">Nombre</th>
            <th class="head-ingredientes">Ingredientes</th>
            <th class="head-aclaraciones">Aclaraciones</th>
        </tr>
       <!-- <tr>
            <td>1</td>
            <td>10:00</td>
            <td>Hamburguesa Simple</td>
            <td>Carne, Lechuga, Tomate</td>
            <td>Sin cebolla</td>
        </tr>
        <tr>
            <td>2</td>
            <td>10:15</td>
            <td>Hamburguesa Doble</td>
            <td>Carne, Lechuga, Tomate, Queso</td>
            <td>Sin pepinillos</td>
        </tr>-->
    </table>
    </section>
    </main>
</body>
</html>