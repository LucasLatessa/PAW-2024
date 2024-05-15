<!DOCTYPE html>
<html lang="en">
<head>
    <?php require __DIR__ . '\../parts/head.view.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/assets/styles/estadoCocina.css" /> 
    <script src="/assets/js/components/paw.js"></script>
    <!--<script src="/assets/js/appEstadoCocina.js"></script>-->


    <title>Estado Cocina - Paw Power</title>
</head>
<body>
    <main>
        <header class="header-principal">
                <?php $home = $this->rutasLogoHeader ?>
                <a href=" <?= $home["href"] ?>">
                    <img src="../assets/Imagotipo-blanco.png" alt="Paw Power" class="logo" />
                </a>
        </header>


        <h2>Hora - 16:00</h2>

        <section class="pedidos">
            <article class="pedido">
                <div class="cabecera1"> PEDIDO #0004A  </div> <!--con color de pedido-->
                <article class="items">
                    <ul class="item">
                        <li class="info-item">Hamburguesa Americana</li>
                        <li class="info-item">lechuga, barbacoa, pepinillos, carne x2, tomate</li>
                        <li class="info-item">Obs</li>
                    </ul>
                    <ul class="item">
                        <li class="info-item">Hamburguesa Americana</li>
                        <li class="info-item">lechuga, barbacoa, pepinillos, carne x2, tomate</li>
                        <li class="info-item">Obs</li>
                    </ul>
                </article>
                <a href="">LISTO</a> <!--boton a generar con js junto con el resto-->
            </article>
            <article class="pedido">
                <div class="cabecera2"> PEDIDO #0005A </div>
                <article class="items">
                    <ul class="item">
                        <li class="info-item">Hamburguesa con Queso</li>
                        <li class="info-item">lechuga, barbacoa, pepinillos, carne x2, tomate</li>
                        <li class="info-item">Obs</li>
                    </ul>
                    <ul class="item">
                        <li class="info-item">Hamburguesa con Queso</li>
                        <li class="info-item">lechuga, barbacoa, pepinillos, carne x2, tomate</li>
                        <li class="info-item">Obs</li>
                    </ul>
                    <ul class="item">
                        <li class="info-item">Hamburguesa con Queso</li>
                        <li class="info-item">lechuga, barbacoa, pepinillos, carne x2, tomate</li>
                        <li class="info-item">Obs</li>
                    </ul>
                    <ul class="item">
                        <li class="info-item">Hamburguesa con Queso</li>
                        <li class="info-item">lechuga, barbacoa, pepinillos, carne x2, tomate</li>
                        <li class="info-item">Obs</li>
                    </ul>
                    </article>
                <a href="">LISTO</a>
            </article>
            <article class="pedido">
                <div class="cabecera3"> PEDIDO #0002A </div>
                <article class="items">
                <ul class="item">
                    <li class="info-item">Hamburguesa PAW BBQ</li>
                    <li class="info-item">lechuga, barbacoa, pepinillos, carne x2, tomate</li>
                    <li class="info-item">Obs</li>
                </ul>
                </article>
            </article>
            <article class="pedido">
                <div class="cabecera4"> PEDIDO #0001A </div>
                <article class="items">
                <ul class="item">
                    <li class="info-item">Hamburguesa Triple Cheddar</li>
                    <li class="info-item">lechuga, barbacoa, pepinillos, carne x2, tomate</li>
                    <li class="info-item">Obs</li>
                </ul>
                <ul class="item">
                    <li class="info-item">Hamburguesa Triple Cheddar</li>
                    <li class="info-item">lechuga, barbacoa, pepinillos, carne x2, tomate</li>
                    <li class="info-item">Obs</li>
                </ul>
                </article>
                <a href="">LISTO</a>
            </article>
        </section>
    

        <section class="display-secundario">
          <section class="pedidos-secundarios">
            <!--idem-->
                <article>

                </article>
                <article>

                </article>
                <article>

                </article>
                <article>

                </article>
           </section>
    
        </section>

    </main>
</body>
</html>